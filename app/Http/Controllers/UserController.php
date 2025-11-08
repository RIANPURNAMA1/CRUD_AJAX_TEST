<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function getData()
    {
        $users = User::with('roles')
            ->select(['id', 'role_id', 'name', 'phone', 'email', 'address', 'photo', 'status']);

        return DataTables::of($users)
            ->addColumn('role_id', function ($user) {
                return $user->roles->name;
            })
            ->addColumn('photo', function ($user) {
                // ✅ Ganti Storage::url() dengan asset() untuk akses file dari public/
                $photoUrl = $user->photo ? asset($user->photo) : asset('images/default.png');
                return '<img src="' . e($photoUrl) . '" alt="' . e($user->name) . '" class="w-10 h-10 rounded-full object-cover">';
            })
            ->addColumn('action', function ($user) {
                // Tombol status aktif / nonaktif
                $statusButton = $user->status === 'active'
                    ? '<button class="bg-red-700 px-4 py-2 rounded-md text-white statusButton" data-id="' . e($user->id) . '" data-status="inactive">
                            <i class="fa-solid fa-times"></i> 
                        </button>'
                    : '<button class="bg-green-700 px-4 py-2 rounded-md text-white statusButton" data-id="' . e($user->id) . '" data-status="active">
                            <i class="fa-solid fa-check"></i> 
                        </button>';

                return '<div class="flex gap-2">
                            <a href="#" class="text-green-500 flex items-center border-2 rounded-md px-3 py-1 text-2xl editUserButton" 
                               data-id="' . e($user->id) . '" 
                               data-name="' . e($user->name) . '" 
                               data-role_id="' . e($user->role_id) . '" 
                               data-phone="' . e($user->phone) . '" 
                               data-email="' . e($user->email) . '" 
                               data-address="' . e($user->address) . '" 
                               data-photo="' . e($user->photo) . '">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <a href="#" class="text-red-500 flex items-center border-2 rounded-md px-3 py-1 text-2xl deleteUserButton" data-id="' . e($user->id) . '"> 
                                <i class="fa-solid fa-trash-can"></i>
                            </a>

                            <a href="#" class="text-blue-500 flex items-center border-2 rounded-md px-3 py-1 text-2xl showUserButton" data-id="' . e($user->id) . '"> 
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            ' . $statusButton . '
                        </div>';
            })
            ->rawColumns(['photo', 'action'])
            ->make(true);
    }
        public function index()
    {
        $title = 'Data Users';
        $user = User::all();
        return view('users.index', compact('title', 'user'));
    }

    public function count(){
        $userCount = User::count();
        $rolesCount = Roles::count();
        return view('dashboard', compact('userCount', 'rolesCount'));
    }

    public function create()
    {
        $title = 'Create User';
        $dataRoles = Roles::all();
        return view('users.index', compact('dataRoles', 'title'));
    }

    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id); // Mengambil pengguna beserta role-nya
        $user->photo = $user->photo ? Storage::url($user->photo) : null;
        return response()->json($user); // Mengembalikan data pengguna dalam format JSON
    }

   public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'role_id' => 'required|exists:roles,id',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email',
        'address' => 'required|string|max:500',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Upload foto langsung ke folder public/images/users
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');

        // Buat nama unik untuk file gambar
        $imageName = time() . '_' . $image->getClientOriginalName();

        // Pindahkan ke folder public/images/users
        $image->move(public_path('images/users'), $imageName);

        // Simpan path relatif ke database
        $validatedData['photo'] = 'images/users/' . $imageName;
    }

    // Simpan data user ke database
    $user = User::create($validatedData);

    // Return response JSON
    return response()->json([
        'success' => 'Data has been saved successfully.',
        'data' => $user
    ], 201);
}


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user->photo = $user->photo ? Storage::url($user->photo) : null;
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Find the user by ID
            $user = User::findOrFail($id);

            // Update user fields
            $user->name = $request->input('name');
            $user->role_id = $request->input('role_id');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->address = $request->input('address');

            // Handle photo upload
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('public/photos');
                $user->photo = $photoPath;
            }

            // Save updated user
            $user->save();

            // Return success response
            return response()->json(['success' => true, 'message' => 'User updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error updating user.'], 500);
        }
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);  // Mencari user berdasarkan ID
        $user->delete();  // Menghapus user
        return response()->json(['message' => 'User deleted successfully']);  // Mengirimkan respon sukses
    }

    // fungsi untuk active dan inactive user
    public function changeStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['message' => 'Status changed successfully']);
    }
}
