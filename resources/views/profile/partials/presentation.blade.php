<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet"
    href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<section class="pt-16 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
        <div
            class="p-4 sm:p-8 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none sm:rounded-lg">
            <div class="px-6 ">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4 flex justify-center">
                        <div class="relative">
                            <img alt="..."
                                src="https://static.vecteezy.com/system/resources/previews/008/422/689/original/social-media-avatar-profile-icon-isolated-on-square-background-vector.jpg"
                                class="shadow-xl mx-auto rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                        </div>
                    </div>
                    <div class="w-full px-4 text-center mt-20">
                        <!--<div class="flex justify-center py-4 lg:pt-4 pt-8">
                            <div class="mr-4 p-3 text-center">
                                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-400">
                                    3
                                </span>
                                <span class="text-sm text-blueGray-400">Music Styles</span>
                            </div>
                            <div class="lg:mr-4 p-3 text-center">
                                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-400">
                                    0
                                </span>
                                <span class="text-sm text-blueGray-400">Listens</span>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="text-center mt-12">
                    <h3 class="text-2xl font-semibold leading-normal mb-2 text-white mb-2">
                        {{ old('name', $user->name) }}
                    </h3>
                    <!--<div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                        Most listening place :
                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                        Lyon, France
                    </div>
                    <div class="mb-2 text-blueGray-300 mt-10">
                        <i class="fas fa-headphones-alt mr-2 text-lg text-gray-400"></i>
                        Music Styles <br><br>
                        <div class="flex space-x-4 justify-center text-black">
                            <div class="bg-pink-200 rounded-full p-2">Pop</div>
                            <div class="bg-emerald-200 rounded-full p-2">Rock</div>
                            <div class="bg-red-200 rounded-full p-2">Funk</div>
                        </div>
                    </div>-->
                    <div>
                        <h3 class="text-2xl font-semibold leading-normal mb-2 text-white mb-2">
                            <br>Favorite Artists
                        </h3>

                        <div class="flex flex-wrap justify-center">
                            @foreach($favoriteArtists as $artist)
                                <div class="bg-white p-2 rounded-lg shadow-md m-2 text-center">
                                    {{$artist}}<br>
                                    <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                    Lyon, France<br><br>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-9/12 px-4">
                            <p class="mb-4 text-lg leading-relaxed text-gray-400">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit aspernatur sed
                                doloribus itaque necessitatibus aliquid odio animi ratione nesciunt ipsa modi, vel
                                temporibus sapiente? Eaque, temporibus! Illum beatae eius omnis?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
