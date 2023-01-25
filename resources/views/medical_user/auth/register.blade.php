<x-guest-layout>
    <form method="POST" action="{{ route('medical_user.register') }}">
        @csrf

        <!-- Name -->
        <div class="mt-2">
            <x-input-label for="name" :value="__('名前')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Name_kana -->
        <div class="mt-2">
            <x-input-label for="name_kana" :value="__('かな')" />
            <x-text-input id="name_kana" class="block mt-1 w-full" type="text" name="name_kana" :value="old('name_kana')" required autofocus />
            <x-input-error :messages="$errors->get('name_kana')" class="mt-2" />
        </div>

        <!-- Birth -->
        <div class="mt-2">
            <x-input-label for="birth" :value="__('生年月日')" />
            <x-text-input id="birth" class="block mt-1 w-full" type="date" name="birth" :value="old('birth')" required autofocus />
            <x-input-error :messages="$errors->get('birth')" class="mt-2" />
        </div>

        <!-- sex -->
        <div class="mt-2">
            <x-input-label for="sex" :value="__('性別')" />
            <input id="sex" class="" type="radio" name="sex" value="male" :value="old('sex')" required autofocus /><label>男性</label>
            <input id="sex" class="ml-3" type="radio" name="sex" value="female" :value="old('sex')" required autofocus /><label>女性</label>
            <input id="sex" class="ml-3" type="radio" name="sex" value="not_select" :value="old('sex')" required autofocus /><label>選択しない</label>
            <x-input-error :messages="$errors->get('sex')" class="mt-2" />
        </div>

        <!-- job -->
        <div class="mt-2">
            <x-input-label for="job" :value="__('職業')" />
            <input id="job" class="" type="radio" name="job" value="doctor" :value="old('job')" required autofocus /><label>医師</label>
            <input id="job" class="ml-3" type="radio" name="job" value="nurse" :value="old('job')" required autofocus /><label>看護師</label>
            <input id="job" class="ml-3" type="radio" name="job" value="pharmacist" :value="old('job')" required autofocus /><label>薬剤師</label>
            <input id="job" class="ml-3" type="radio" name="job" value="care_manager" :value="old('job')" required autofocus /><label>ケアマネージャー</label>
            <x-input-error :messages="$errors->get('job')" class="mt-2" />
        </div>

        <!-- image -->
        <div class="mt-2">
            <x-input-label for="image" :value="__('写真')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-2">
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('確認用パスワード')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('medical_user.login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
