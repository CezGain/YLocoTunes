<x-template :showHeader="true">
<x-app-layout>
    @include('components.background')

    <div class="py-12 bg-dots-lighter w-full bg-center bg-gray-800">
        <!--<div style="height: 10%; width: 100%; display: flex; align-items:center; padding-right: 6%;">
            <a href="{{ url('..') }}" style="padding-left:50px; color: white; font-size: 140%; margin-right: 20px">Accueil</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="color: white; font-size: 140%;">Déconnexion</button>
            </form>
        </div>-->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('profile.partials.presentation')
            <div class="p-4 sm:p-8 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</x-template>
