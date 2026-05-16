<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-8 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4 text-indigo-700">Chào mừng bạn đến với Hệ thống Quản lý Sản phẩm</h3>
                    <p class="mb-4 text-lg text-gray-600">Đây là trang tổng quan đơn giản. Hệ thống này được xây dựng với các chức năng cơ bản bao gồm:</p>
                    
                    <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                        <ul class="list-disc list-inside space-y-3 text-gray-700 text-base">
                            <li><strong>Đăng ký & Đăng nhập:</strong> Xác thực người dùng an toàn.</li>
                            <li><strong>Xem danh sách:</strong> Mọi người dùng (kể cả khách) đều có thể xem danh sách sản phẩm và thông tin chi tiết.</li>
                            <li><strong>Quản lý sản phẩm:</strong> Chỉ những người dùng <span class="text-red-500 font-semibold">đã đăng nhập</span> mới được phép Thêm mới, Chỉnh sửa và Xóa sản phẩm.</li>
                        </ul>
                    </div>

                    @auth
                        <div class="mt-8 p-4 bg-indigo-50 border-l-4 border-indigo-500 rounded-r-md">
                            <p class="text-indigo-800 text-lg">Xin chào <strong>{{ Auth::user()->name }}</strong>! Bạn đang đăng nhập và có toàn quyền quản trị sản phẩm.</p>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
