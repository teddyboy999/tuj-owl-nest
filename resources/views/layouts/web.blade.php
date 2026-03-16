<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>TUJ Owl Nest</title>
        @viteReactRefresh
        @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/js/app.tsx'])
    </head>
    <body class="h-screen bg-white">
        <div class="flex flex-col min-h-screen">
            <div class="flex flex-col min-h-screen">
                <main class="grow">
                    @yield('content')
                </main>    
            </div>

            {{-- Push content to the bottom with = "flex flex-col min-h-screen" or "fixed inset-x-0 bottom-0"--}}
            <footer class="bg-[#272727] text-white py-8">
                <div
                    class="mx-auto max-w-7xl flex-col space-y-8 px-4 sm:px-6 lg:px-8"
                >
                    <div class="text-left font-bold text-white">
                        <p>Temple University, Japan Campus</p>
                        <p>1-14-29 Taishido, Setagaya-ku</p>
                        <p>Tokyo, Japan 154-0004</p>
                    </div>

                <div class="flex space-x-4">
                    <a href="https://www.tiktok.com/@templeunivjapan" class="social-link" target="__blank" alt="TikTok">
                        <svg class="h-6 w-6 social-icon" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.17-2.86-.6-4.12-1.31a6.34 6.34 0 01-2.02-1.84v6.27c.02 1.47-.32 3-.13 4.41-.4 3.03-3.1 5.48-6.12 5.48-3.03 0-5.48-2.45-5.48-5.48 0-3.03 2.45-5.48 5.48-5.48.33 0 .66.03.98.08v4.03c-1.31-.41-2.73.23-3.21 1.49-.48 1.26.04 2.78 1.24 3.4.74.38 1.63.38 2.37 0 1.2-.62 1.72-2.14 1.24-3.4-.08-.2-.18-.4-.3-.58V.02z"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/templeunivjapan/" class="social-link" target="__blank" alt="Instagram">
                        <svg class="h-6 w-6 social-icon" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.332 3.608 1.308.975.975 1.245 2.242 1.308 3.607.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.332 2.633-1.308 3.608-.975.975-2.242 1.245-3.607 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.332-3.608-1.308-.975-.975-1.245-2.242-1.308-3.607-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.332-2.633 1.308-3.608.975-.975 2.242-1.245 3.607-1.308 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-1.277.057-2.148.258-2.911.554a4.915 4.915 0 00-1.777 1.157 4.916 4.916 0 00-1.157 1.777c-.296.763-.497 1.634-.554 2.911-.058 1.28-.072 1.688-.072 4.947s.014 3.667.072 4.947c.057 1.277.258 2.148.554 2.911a4.915 4.915 0 001.157 1.777 4.917 4.917 0 001.777 1.157c.763.296 1.634.497 2.911.554 1.28.058 1.688.072 4.947.072s3.667-.014 4.947-.072c1.277-.057 2.148-.258 2.911-.554a4.915 4.915 0 001.777-1.157 4.915 4.915 0 001.157-1.777c.296-.763.497-1.634.554-2.911.058-1.28.072-1.688.072-4.947s-.014-3.667-.072-4.947c-.057-1.277-.258-2.148-.554-2.911a4.915 4.915 0 00-1.157-1.777 4.915 4.915 0 00-1.777-1.157c-.763-.296-1.634-.497-2.911-.554-1.28-.058-1.688-.072-4.947-.072zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/c/TempleUniversityJapanCampus" class="social-link" target="__blank" alt="Youtube">
                        <svg class="h-6 w-6 social-icon" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                </div>
                </div>
                    <div class="copyright-text">
                        <p class="text-white italic">
                            Copyright 2026, Temple University, Japan Campus. All
                            rights reserved.
                        </p>
                    </div>
                    <img src="https://www.tuj.ac.jp/modules/custom/tu_layout/images/brand/temple-logo-japan.png" alt="temple-logo-footer" class="temple-logo-footer"/>
                </div>
            </footer>
        </div>
    </body>
</html>
