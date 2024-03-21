<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
</head>

<body>
    <!-- Components are ANY element which can be reused across the site -->
    <nav>
        <x-nav-link>
            <x-slot:url></x-slot>
                <x-slot:title>Home</x-slot>
        </x-nav-link>
        <x-nav-link>
            <x-slot:url>about</x-slot>
                <x-slot:title>About</x-slot>
        </x-nav-link>
        <x-nav-link>
            <x-slot:url>contact</x-slot>
                <x-slot:title>Contact</x-slot>
        </x-nav-link>
    </nav>
    <!-- read as php echo -->
    {{ $slot }}

</body>

</html>