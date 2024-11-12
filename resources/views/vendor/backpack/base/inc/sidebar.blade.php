<!-- {{-- File: resources/views/vendor/backpack/base/inc/sidebar.blade.php --}}
@include('backpack::inc.sidebar_content')

<x-backpack::menu-dropdown title="Authentication" icon="la la-group">
  <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
  <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
  <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown> -->