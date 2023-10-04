<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet"
    href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<section class="pt-16">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="px-6">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4 flex justify-center">
                        <div class="relative">
                            <img alt="..."
                                src="https://static.vecteezy.com/system/resources/previews/008/422/689/original/social-media-avatar-profile-icon-isolated-on-square-background-vector.jpg"
                                class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                        </div>
                    </div>
                    <div class="w-full px-4 text-center mt-20">
                        <div class="flex justify-center py-4 lg:pt-4 pt-8">
                            <div class="mr-4 p-3 text-center">
                                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                    0
                                </span>
                                <span class="text-sm text-blueGray-400">Music Styles</span>
                            </div>
                            <div class="lg:mr-4 p-3 text-center">
                                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                    0
                                </span>
                                <span class="text-sm text-blueGray-400">Listens</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-12">
                    <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                        {{ old('name', $user->name) }}
                    </h3>
                    <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                        Most listening place :
                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                        Los Angeles, California
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-10">
                        <i class="fas fa-headphones-alt mr-2 text-lg text-blueGray-400"></i>
                        Pop / Rock / Fonk
                    </div>
                </div>
                <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-9/12 px-4">
                            <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
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