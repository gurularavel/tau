<x-admin.layout>
<body>


    <div id="layout-wrapper">

        <x-admin.header/>

        <x-admin.remove-notification/>


        <x-admin.app-menu/>

        <div class="vertical-overlay"></div>

        <x-admin.main-content :data="$data"/>
        <x-admin.crud.success-message-modal :delay="'5000'"/>


    </div>



    <x-admin.back-to-up/>


    <x-admin.preloader/>


</x-admin.layout>
