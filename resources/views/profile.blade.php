<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('styles/styledashboardprofile.css')}}" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="{{asset('js/systemdashboardprofile.js')}}"></script>
    <title>Dashboard</title>
</head>

<body class="bg-white min-h-screen flex flex-col">
    <x-header>
    <div class="bg-gray-100 p-8">
        <form class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-lg" action="{{}}" >
            <h1 class="text-xl font-semibold">My Profile</h1>
            <p class="text-gray-600 text-sm">Manage your profile information to control, protect and secure your
                account.</p>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <div>
                    <label class="block text-gray-700">First Name</label>
                    <input type="text" id="fullName" placeholder="Your First Name"
                        class="w-full mt-1 p-2 border rounded-md bg-gray-100">
                </div>
                <div>
                    <label class="block text-gray-700">Last Name</label>
                    <input type="text" id="nickName" placeholder="Your Last Name"
                        class="w-full mt-1 p-2 border rounded-md bg-gray-100">
                </div>
                <div>
                    <label class="block text-gray-700">New Password</label>
                    <input type="text" id="nickName" placeholder="Your Ne Name"
                        class="w-full mt-1 p-2 border rounded-md bg-gray-100">
                </div>
            </div>
            <div class="mt-6 text-center">
                <button id="saveBtn" class="bg-teal-600 text-white px-6 py-2 rounded-md">SAVE</button>
            </div>
        </form>

    </div>

    <x-footer>
</body>
</body>

</html>