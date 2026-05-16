<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- Welcome Banner --}}
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-700 shadow-xl p-8 text-white">
                {{-- Decorative circles --}}
                <div class="absolute -top-8 -right-8 w-48 h-48 bg-white opacity-5 rounded-full"></div>
                <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-white opacity-5 rounded-full"></div>
                <div class="absolute top-4 right-24 w-24 h-24 bg-white opacity-5 rounded-full"></div>

                <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <p class="text-indigo-200 text-sm font-medium uppercase tracking-widest mb-1">Chào mừng trở lại</p>
                        <h1 class="text-3xl font-bold">{{ Auth::user()->name }} 👋</h1>
                        <p class="text-indigo-200 mt-2 text-sm">{{ now()->format('l, d F Y') }}</p>
                    </div>
                    <div class="bg-white bg-opacity-15 backdrop-blur-sm rounded-xl px-6 py-4 text-center border border-white border-opacity-20">
                        <p class="text-indigo-100 text-xs uppercase tracking-wider mb-1">Email</p>
                        <p class="font-semibold text-sm">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                {{-- Products count --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-5 hover:shadow-md transition-shadow duration-200">
                    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 p-4 rounded-xl shadow-md shadow-indigo-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 3H8a2 2 0 00-2 2v2h12V5a2 2 0 00-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider font-medium">Sản phẩm</p>
                        <p class="text-3xl font-bold text-gray-800 mt-0.5">{{ \App\Models\Product::count() }}</p>
                        <a href="{{ route('products.index') }}" class="text-xs text-indigo-500 hover:text-indigo-700 font-medium mt-1 inline-block">Xem tất cả →</a>
                    </div>
                </div>

                {{-- Users count --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-5 hover:shadow-md transition-shadow duration-200">
                    <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 p-4 rounded-xl shadow-md shadow-emerald-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider font-medium">Người dùng</p>
                        <p class="text-3xl font-bold text-gray-800 mt-0.5">{{ \App\Models\User::count() }}</p>
                        <p class="text-xs text-gray-400 mt-1">Đã đăng ký</p>
                    </div>
                </div>

                {{-- Total value --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-5 hover:shadow-md transition-shadow duration-200">
                    <div class="bg-gradient-to-br from-amber-500 to-orange-500 p-4 rounded-xl shadow-md shadow-amber-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider font-medium">Tổng giá trị</p>
                        <p class="text-3xl font-bold text-gray-800 mt-0.5">${{ number_format(\App\Models\Product::sum('price'), 0) }}</p>
                        <p class="text-xs text-gray-400 mt-1">Tất cả sản phẩm</p>
                    </div>
                </div>
            </div>

            {{-- Features Grid --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center gap-3 mb-7">
                    <div class="w-1 h-6 bg-gradient-to-b from-indigo-500 to-purple-600 rounded-full"></div>
                    <h2 class="text-lg font-bold text-gray-800">Hệ thống có thể làm gì?</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">

                    <div class="group rounded-xl border border-gray-100 bg-gray-50 hover:bg-indigo-50 hover:border-indigo-200 p-5 transition-all duration-200">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-2xl">🔐</span>
                            <h3 class="font-semibold text-gray-800 group-hover:text-indigo-700 transition-colors">Đăng ký & Đăng nhập</h3>
                        </div>
                        <p class="text-sm text-gray-500 leading-relaxed">Xác thực người dùng an toàn. Mật khẩu được mã hóa bằng <strong class="text-gray-700">Bcrypt</strong> trước khi lưu vào database.</p>
                    </div>

                    <div class="group rounded-xl border border-gray-100 bg-gray-50 hover:bg-blue-50 hover:border-blue-200 p-5 transition-all duration-200">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-2xl">➕</span>
                            <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors">Thêm sản phẩm</h3>
                        </div>
                        <p class="text-sm text-gray-500 leading-relaxed">Tạo sản phẩm mới với <strong class="text-gray-700">tựa đề, ngày tháng, mô tả, hình ảnh và giá</strong>. Hỗ trợ upload ảnh JPG/PNG/GIF.</p>
                    </div>

                    <div class="group rounded-xl border border-gray-100 bg-gray-50 hover:bg-emerald-50 hover:border-emerald-200 p-5 transition-all duration-200">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-2xl">📋</span>
                            <h3 class="font-semibold text-gray-800 group-hover:text-emerald-700 transition-colors">Xem danh sách</h3>
                        </div>
                        <p class="text-sm text-gray-500 leading-relaxed">Hiển thị toàn bộ sản phẩm dưới dạng bảng với <strong class="text-gray-700">phân trang</strong>, ảnh thumbnail, giá và ngày tháng.</p>
                    </div>

                    <div class="group rounded-xl border border-gray-100 bg-gray-50 hover:bg-amber-50 hover:border-amber-200 p-5 transition-all duration-200">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-2xl">✏️</span>
                            <h3 class="font-semibold text-gray-800 group-hover:text-amber-700 transition-colors">Chỉnh sửa sản phẩm</h3>
                        </div>
                        <p class="text-sm text-gray-500 leading-relaxed">Cập nhật thông tin sản phẩm bất kỳ lúc nào. <strong class="text-gray-700">Ảnh cũ được giữ nguyên</strong> nếu không upload ảnh mới.</p>
                    </div>

                    <div class="group rounded-xl border border-gray-100 bg-gray-50 hover:bg-red-50 hover:border-red-200 p-5 transition-all duration-200">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-2xl">🗑️</span>
                            <h3 class="font-semibold text-gray-800 group-hover:text-red-700 transition-colors">Xóa sản phẩm</h3>
                        </div>
                        <p class="text-sm text-gray-500 leading-relaxed">Xóa sản phẩm khỏi hệ thống với <strong class="text-gray-700">hộp thoại xác nhận</strong> trước khi thực hiện để tránh xóa nhầm.</p>
                    </div>

                    <div class="group rounded-xl border border-gray-100 bg-gray-50 hover:bg-purple-50 hover:border-purple-200 p-5 transition-all duration-200">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-2xl">🔒</span>
                            <h3 class="font-semibold text-gray-800 group-hover:text-purple-700 transition-colors">Bảo mật & Phân quyền</h3>
                        </div>
                        <p class="text-sm text-gray-500 leading-relaxed">Chỉ người dùng <strong class="text-gray-700">đã đăng nhập</strong> mới được phép thêm, sửa, xóa sản phẩm. Tự động chuyển hướng nếu chưa xác thực.</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
