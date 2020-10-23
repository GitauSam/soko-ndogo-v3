<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Soko Ndogo </title>

        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../_tailwind-headers-footers/tailwind-headers-footers.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

		<style>
            body {
                    font-family: 'Nunito';
                }
		</style>
    </head>
    <body class="bg-white font-sans leading-normal tracking-normal antialiased">
        <!---Global Header-->
        <header class="text-gray-700 body-font border-b border-gray-300 ">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a href="https://wickedtemplates.com?ref=seychellesDemo"
                    class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                    <svg width="80" height="80" viewBox="0 0 312 311" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="156" cy="155.5" r="155.5" fill="white"></circle>
                        <path
                            d="M92.5356 87.4287L153.536 80.8929L216.714 87.4287V187.643L157.893 224.679L92.5356 187.643V87.4287Z"
                            fill="white"></path>
                        <path
                            d="M92.065 84.1441L155.714 70L219.364 84.1441C221.084 84.5268 222.622 85.4839 223.725 86.8583C224.827 88.2327 225.429 89.9424 225.429 91.7046V169.064C225.428 176.715 223.539 184.247 219.928 190.993C216.317 197.739 211.097 203.489 204.731 207.732L155.714 240.412L106.698 207.732C100.332 203.489 95.1132 197.741 91.5021 190.996C87.8917 184.253 86.0019 176.721 86 169.072V91.7046C86 89.9424 86.6013 88.2327 87.7039 86.8583C88.8065 85.4839 90.345 84.5268 92.065 84.1441ZM101.492 97.9164V169.064C101.492 174.164 102.751 179.186 105.158 183.683C107.564 188.18 111.044 192.013 115.288 194.843L155.714 221.799L196.141 194.843C200.383 192.014 203.862 188.182 206.269 183.686C208.675 179.191 209.935 174.171 209.936 169.072V97.9164L155.714 85.8794L101.492 97.9164Z"
                            fill="#0a165c"></path>
                        <path
                            d="M166.324 148.027C167.005 148.027 167.494 148.175 167.79 148.471C168.116 148.767 168.279 149.152 168.279 149.626C168.279 150.396 168.042 151.077 167.568 151.669C167.124 152.261 166.413 152.572 165.436 152.602C163.097 152.632 160.995 152.454 159.129 152.069C157.056 156.481 154.554 160.152 151.623 163.084C148.721 165.986 145.849 167.436 143.007 167.436C140.401 167.436 138.447 166.06 137.144 163.306C135.841 160.523 135.101 156.806 134.923 152.158C133.146 157.31 131.133 161.144 128.883 163.661C126.662 166.178 124.293 167.436 121.776 167.436C118.934 167.436 116.787 165.675 115.336 162.151C113.885 158.598 113.16 153.831 113.16 147.85C113.16 143.497 113.545 138.715 114.315 133.504C114.522 132.023 114.892 131.002 115.425 130.439C115.988 129.847 116.861 129.551 118.045 129.551C118.934 129.551 119.615 129.743 120.089 130.128C120.592 130.513 120.844 131.224 120.844 132.26C120.844 132.467 120.814 132.867 120.755 133.459C119.866 139.529 119.422 144.696 119.422 148.96C119.422 152.928 119.763 155.992 120.444 158.154C121.125 160.315 122.043 161.396 123.198 161.396C124.234 161.396 125.478 160.315 126.928 158.154C128.409 155.963 129.875 152.735 131.325 148.471C132.776 144.178 134.005 139.07 135.012 133.148C135.249 131.786 135.678 130.853 136.3 130.35C136.951 129.817 137.825 129.551 138.92 129.551C139.838 129.551 140.505 129.758 140.919 130.172C141.363 130.557 141.585 131.15 141.585 131.949C141.585 132.423 141.556 132.793 141.496 133.059C140.667 137.886 140.253 142.712 140.253 147.539C140.253 150.825 140.356 153.446 140.564 155.4C140.801 157.354 141.23 158.85 141.852 159.886C142.503 160.893 143.436 161.396 144.65 161.396C146.071 161.396 147.655 160.33 149.402 158.198C151.149 156.037 152.748 153.357 154.199 150.159C152.393 149.034 151.031 147.583 150.113 145.806C149.195 144 148.736 141.928 148.736 139.588C148.736 137.249 149.091 135.28 149.802 133.681C150.542 132.053 151.534 130.839 152.778 130.039C154.051 129.24 155.457 128.84 156.997 128.84C158.892 128.84 160.388 129.521 161.483 130.883C162.608 132.245 163.171 134.111 163.171 136.479C163.171 139.825 162.445 143.541 160.995 147.627C162.505 147.894 164.281 148.027 166.324 148.027ZM153.222 139.277C153.222 142.179 154.155 144.326 156.02 145.718C157.175 142.401 157.752 139.662 157.752 137.501C157.752 136.257 157.589 135.354 157.264 134.792C156.938 134.199 156.494 133.903 155.931 133.903C155.132 133.903 154.48 134.377 153.977 135.325C153.474 136.242 153.222 137.56 153.222 139.277ZM199.182 130.35C200.1 130.528 200.781 130.839 201.225 131.283C201.699 131.727 201.936 132.245 201.936 132.837C201.936 133.814 201.655 134.525 201.092 134.969C200.559 135.413 199.7 135.591 198.516 135.502C195.851 135.295 193.764 135.162 192.253 135.102C190.773 135.014 188.819 134.954 186.391 134.925C185.295 140.373 184.288 145.851 183.371 151.358C183.045 153.372 182.704 155.711 182.349 158.376C181.994 161.011 181.757 163.143 181.638 164.772C181.579 165.63 181.224 166.296 180.572 166.77C179.921 167.214 179.136 167.436 178.218 167.436C177.241 167.436 176.486 167.2 175.953 166.726C175.42 166.252 175.154 165.63 175.154 164.86C175.154 164.15 175.257 162.98 175.465 161.352C175.702 159.693 175.968 157.961 176.264 156.155C176.59 154.349 176.842 152.78 177.019 151.447C177.345 149.197 177.715 146.961 178.13 144.74C178.544 142.52 178.959 140.417 179.373 138.434C179.462 137.989 179.566 137.486 179.684 136.923C179.803 136.331 179.936 135.68 180.084 134.969C177.182 135.058 174.902 135.295 173.244 135.68C171.586 136.065 170.401 136.613 169.691 137.323C169.01 138.004 168.669 138.893 168.669 139.988C168.669 140.995 168.965 141.957 169.558 142.875C169.676 143.082 169.735 143.304 169.735 143.541C169.735 144.104 169.395 144.637 168.714 145.14C168.062 145.614 167.381 145.851 166.671 145.851C166.167 145.851 165.753 145.703 165.427 145.407C164.835 144.903 164.346 144.193 163.961 143.275C163.576 142.327 163.384 141.261 163.384 140.077C163.384 137.56 164.198 135.547 165.827 134.037C167.485 132.497 169.987 131.372 173.333 130.661C176.708 129.95 181.031 129.595 186.302 129.595C189.559 129.595 192.15 129.654 194.074 129.773C196.029 129.891 197.731 130.084 199.182 130.35Z"
                            fill="#0a165c"></path>
                    </svg>
                </a>
                <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                </nav>
                <a href="https://www.wickedtemplates.com/seychelles-details?ref=seychellesDemo">
                    <button
                        class="inline-flex hero_button items-center global-header border-0 py-1 px-3 focus:outline-none hover:bg-indigo-500 rounded text-white mt-4 md:mt-0">
                        Buy Now
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </a>
            </div>
        </header>
        <!---End Global Header-->

        <!--- Navigation -->
        <header class="text-gray-700">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a href="#" class="logo flex title-font font-medium items-center text-black mb-4 md:mb-0">
                     Logo
                </a>
                <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center hidden md:block">
                    <a class="mr-5 hover:text-black font-semibold"> Link</a>
                    <a class="mr-5 hover:text-black font-semibold"> Link</a>
                    <a class="mr-5 hover:text-black font-semibold"> Link</a>
                    <a class="mr-5 hover:text-black font-semibold"> Link</a>
                    <a class="mr-5 hover:text-black font-semibold"> Link</a>
                </nav>
                <a href="#" rel="noopener" target="_blank">
                <button
                    class="border-2 border-black  text-black block rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700 md:mt-0">
                    See Plans

                </button>
                </a>
            </div>
        </header>
        <!--- First Image -->
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                <div class="text-center lg:w-2/3 w-full">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium	 text-black font-mono">
                        This is your super duper title. </h1>
                    <p class="leading-relaxed mb-8 font-normal">The University of Huddersfield's School of Art, Design
                        and Architecture presents the work of 10 of its award-winning
                        interior design graduates in this school show for Virtual Design Festival.
                    </p>
                    <div class="flex justify-center">
                        <button
                            class="border-2 border-black  text-black block rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-gray-900 hover:text-pink-500 transition ease-in-out duration-700">
                             Show me
                            </button>
                    </div>
                </div>
            </div>
        </section>
        <!--- First Image -->
        <section class="">
            <div class="container mx-auto flex px-10 py-8 items-center justify-center flex-col">
                <img class="lg:w-15/15 md:w-15/5 w-20/6 mb-10 object-cover object-center rounded" alt="hero"
                    src=" https://dummyimage.com/1000x600/edf2f7/0f1631">
            </div>
        </section>
        <section class="">
            <div class="container px-5 py-24 mx-auto flex flex-wrap">
                <div class="flex flex-col text-center w-full mb-20">
                    <h2 class="text-xs text-black tracking-widest font-medium title-font mb-1">THIS IS A USEFUL
                        SMALL TEXT</h2>
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-black">Tell them something about this
                        cards.
                    </h1>
                </div>
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 md:w-1/3">
                        <div class="flex rounded-lg h-full bg-gray-200 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-700 text-lg title-font font-medium">Card title.</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-gray-700 font-medium">House V replaces a property that
                                    had been built on the site nearly 80 years ago, but over time had fallen into
                                    complete disrepair..</p>
                                <a class="mt-3 text-gray-700 inline-flex items-center font-medium">Learn More
                                    »
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/3">
                           <div class="flex rounded-lg h-full bg-gray-200 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-700 text-lg title-font font-medium">Card title.</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-gray-700 font-medium">House V replaces a property that
                                    had been built on the site nearly 80 years ago, but over time had fallen into
                                    complete disrepair..</p>
                                <a class="mt-3 text-gray-700 inline-flex items-center font-medium">Learn More
                                    »
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/3">
                           <div class="flex rounded-lg h-full bg-gray-200 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-700 text-lg title-font font-medium">Card title.</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-gray-700 font-medium">House V replaces a property that
                                    had been built on the site nearly 80 years ago, but over time had fallen into
                                    complete disrepair..</p>
                                <a class="mt-3 text-gray-700 inline-flex items-center font-medium">Learn More
                                    »
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 md:mb-0 mb-10 ">
                    <img class="object-cover object-center rounded" alt="hero"
                        src="https://dummyimage.com/600x500/edf2f7/0f1631">
                </div>
                <div
                    class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black ">The title for your feature.
                        <br class="hidden lg:inline-block">goes here.
                    </h1>
                    <p class="mb-8 leading-relaxed">Central Saint Martins graduate Jessan Macatangay incorporated
                        deconstructed chairs into his striking fashion collection, to symbolise how people carry the
                        weight of personal struggles. More.</p>
                    <div class="flex justify-center">
                        <button
                            class="border-2 border-black  text-black block rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Button</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black">The title for your feature.
                        <br class="hidden lg:inline-block text-black">goes here.
                    </h1>
                    <p class="mb-8 leading-relaxed">Central Saint Martins graduate Jessan Macatangay incorporated
                        deconstructed chairs into his striking fashion collection, to symbolise how people carry the
                        weight of personal struggles. More.</p>
                    <div class="flex justify-center">
                        <button
                            class="border-2 border-black  text-black block rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Button</button>
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero"
                        src="https://dummyimage.com/600x500/edf2f7/0f1631">
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 md:mb-0 mb-10">
                    <img class="object-cover object-center rounded" alt="hero"
                        src="https://dummyimage.com/600x400/edf2f7/0f1631">
                </div>
                <div
                    class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black">The title for your feature.
                        <br class="hidden lg:inline-block">goes here.
                    </h1>
                    <p class="mb-8 leading-relaxed">Central Saint Martins graduate Jessan Macatangay incorporated
                        deconstructed chairs into his striking fashion collection, to symbolise how people carry the
                        weight of personal struggles. More.</p>
                    <div class="flex justify-center">
                        <button
                            class="border-2 border-black  text-black block rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Button</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black">The title for your feature.
                        <br class="hidden lg:inline-block">goes here.
                    </h1>
                    <p class="mb-8 leading-relaxed">Central Saint Martins graduate Jessan Macatangay incorporated
                        deconstructed chairs into his striking fashion collection, to symbolise how people carry the
                        weight of personal struggles. More.</p>
                    <div class="flex justify-center">
                        <button
                            class="border-2 border-black  text-black block rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-white hover:text-indigo-500 transition ease-in-out duration-700">Button</button>
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero"
                        src="https://dummyimage.com/600x400/edf2f7/0f1631">
                </div>
            </div>
        </section>
        <section class="text-black">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="text-2xl font-medium title-font mb-4 text-black">YOUR BELOVED TEAM</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed">
                        We are the cream of the crop and each
                        project is individual and students select a site and develop their own project brief. Through
                        in-depth research and
                        explorative processes, projects are designed and developed, becoming finally realised through
                        technical and visual
                        communication.
                    </p>
                </div>
                <div class="text-gray-600 flex flex-wrap -m-4">
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center bg-gray-800 rounded-lg">
                            <img alt="team"
                                class="flex-shrink-0 rounded-t-lg w-full h-56 object-cover object-center mb-4"
                                src="https://dummyimage.com/400x400/edf2f7/0f1631">
                            <div class="w-full ">
                                <h2 class="title-font font-medium text-lg text-white">Joana Lee</h2>
                                <h3 class=" mb-3">Full Stack Developer</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center bg-gray-800 rounded-lg">
                            <img alt="team"
                                class="flex-shrink-0 rounded-t-lg w-full h-56 object-cover object-center mb-4"
                                src="https://dummyimage.com/400x400/edf2f7/0f1631">
                            <div class="w-full ">
                                <h2 class="title-font font-medium text-lg text-white">Jhon Smith</h2>
                                <h3 class="mb-3">Marketing Director</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center bg-gray-800 rounded-lg">
                            <img alt="team"
                                class="flex-shrink-0 rounded-t-lg w-full h-56 object-cover object-center mb-4"
                                src="https://dummyimage.com/400x400/edf2f7/0f1631">
                            <div class="w-full ">
                                <h2 class="title-font font-medium text-lg text-white">Patricia Swimm</h2>
                                <h3 class="mb-3">Product Designer</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div class="h-full flex flex-col items-center text-center bg-gray-800 rounded-lg">
                            <img alt="team"
                                class="flex-shrink-0 rounded-t-lg w-full h-56 object-cover object-center mb-4"
                                src="https://dummyimage.com/400x400/edf2f7/0f1631">
                            <div class="w-full ">
                                <h2 class="title-font font-medium text-lg text-white">Robert Willow</h2>
                                <h3 class="mb-3">UI Designer</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--- Testimonail Section -->
        <section class="text-black">
            <div class="container px-5 py-24 mx-auto">
                <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                    <svg class="inline-block w-20 h-20 text-gray-700 mb-8" viewBox="0 0 312 311" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M92.5356 87.4287L153.536 80.8929L216.714 87.4287V187.643L157.893 224.679L92.5356 187.643V87.4287Z"
                            fill="white" />
                        <path
                            d="M92.065 84.1441L155.714 70L219.364 84.1441C221.084 84.5268 222.622 85.4839 223.725 86.8583C224.827 88.2327 225.429 89.9424 225.429 91.7046V169.064C225.428 176.715 223.539 184.247 219.928 190.993C216.317 197.739 211.097 203.489 204.731 207.732L155.714 240.412L106.698 207.732C100.332 203.489 95.1132 197.741 91.5021 190.996C87.8917 184.253 86.0019 176.721 86 169.072V91.7046C86 89.9424 86.6013 88.2327 87.7039 86.8583C88.8065 85.4839 90.345 84.5268 92.065 84.1441ZM101.492 97.9164V169.064C101.492 174.164 102.751 179.186 105.158 183.683C107.564 188.18 111.044 192.013 115.288 194.843L155.714 221.799L196.141 194.843C200.383 192.014 203.862 188.182 206.269 183.686C208.675 179.191 209.935 174.171 209.936 169.072V97.9164L155.714 85.8794L101.492 97.9164Z"
                            fill="black" />
                        <path
                            d="M166.324 148.027C167.005 148.027 167.494 148.175 167.79 148.471C168.116 148.767 168.279 149.152 168.279 149.626C168.279 150.396 168.042 151.077 167.568 151.669C167.124 152.261 166.413 152.572 165.436 152.602C163.097 152.632 160.995 152.454 159.129 152.069C157.056 156.481 154.554 160.152 151.623 163.084C148.721 165.986 145.849 167.436 143.007 167.436C140.401 167.436 138.447 166.06 137.144 163.306C135.841 160.523 135.101 156.806 134.923 152.158C133.146 157.31 131.133 161.144 128.883 163.661C126.662 166.178 124.293 167.436 121.776 167.436C118.934 167.436 116.787 165.675 115.336 162.151C113.885 158.598 113.16 153.831 113.16 147.85C113.16 143.497 113.545 138.715 114.315 133.504C114.522 132.023 114.892 131.002 115.425 130.439C115.988 129.847 116.861 129.551 118.045 129.551C118.934 129.551 119.615 129.743 120.089 130.128C120.592 130.513 120.844 131.224 120.844 132.26C120.844 132.467 120.814 132.867 120.755 133.459C119.866 139.529 119.422 144.696 119.422 148.96C119.422 152.928 119.763 155.992 120.444 158.154C121.125 160.315 122.043 161.396 123.198 161.396C124.234 161.396 125.478 160.315 126.928 158.154C128.409 155.963 129.875 152.735 131.325 148.471C132.776 144.178 134.005 139.07 135.012 133.148C135.249 131.786 135.678 130.853 136.3 130.35C136.951 129.817 137.825 129.551 138.92 129.551C139.838 129.551 140.505 129.758 140.919 130.172C141.363 130.557 141.585 131.15 141.585 131.949C141.585 132.423 141.556 132.793 141.496 133.059C140.667 137.886 140.253 142.712 140.253 147.539C140.253 150.825 140.356 153.446 140.564 155.4C140.801 157.354 141.23 158.85 141.852 159.886C142.503 160.893 143.436 161.396 144.65 161.396C146.071 161.396 147.655 160.33 149.402 158.198C151.149 156.037 152.748 153.357 154.199 150.159C152.393 149.034 151.031 147.583 150.113 145.806C149.195 144 148.736 141.928 148.736 139.588C148.736 137.249 149.091 135.28 149.802 133.681C150.542 132.053 151.534 130.839 152.778 130.039C154.051 129.24 155.457 128.84 156.997 128.84C158.892 128.84 160.388 129.521 161.483 130.883C162.608 132.245 163.171 134.111 163.171 136.479C163.171 139.825 162.445 143.541 160.995 147.627C162.505 147.894 164.281 148.027 166.324 148.027ZM153.222 139.277C153.222 142.179 154.155 144.326 156.02 145.718C157.175 142.401 157.752 139.662 157.752 137.501C157.752 136.257 157.589 135.354 157.264 134.792C156.938 134.199 156.494 133.903 155.931 133.903C155.132 133.903 154.48 134.377 153.977 135.325C153.474 136.242 153.222 137.56 153.222 139.277ZM199.182 130.35C200.1 130.528 200.781 130.839 201.225 131.283C201.699 131.727 201.936 132.245 201.936 132.837C201.936 133.814 201.655 134.525 201.092 134.969C200.559 135.413 199.7 135.591 198.516 135.502C195.851 135.295 193.764 135.162 192.253 135.102C190.773 135.014 188.819 134.954 186.391 134.925C185.295 140.373 184.288 145.851 183.371 151.358C183.045 153.372 182.704 155.711 182.349 158.376C181.994 161.011 181.757 163.143 181.638 164.772C181.579 165.63 181.224 166.296 180.572 166.77C179.921 167.214 179.136 167.436 178.218 167.436C177.241 167.436 176.486 167.2 175.953 166.726C175.42 166.252 175.154 165.63 175.154 164.86C175.154 164.15 175.257 162.98 175.465 161.352C175.702 159.693 175.968 157.961 176.264 156.155C176.59 154.349 176.842 152.78 177.019 151.447C177.345 149.197 177.715 146.961 178.13 144.74C178.544 142.52 178.959 140.417 179.373 138.434C179.462 137.989 179.566 137.486 179.684 136.923C179.803 136.331 179.936 135.68 180.084 134.969C177.182 135.058 174.902 135.295 173.244 135.68C171.586 136.065 170.401 136.613 169.691 137.323C169.01 138.004 168.669 138.893 168.669 139.988C168.669 140.995 168.965 141.957 169.558 142.875C169.676 143.082 169.735 143.304 169.735 143.541C169.735 144.104 169.395 144.637 168.714 145.14C168.062 145.614 167.381 145.851 166.671 145.851C166.167 145.851 165.753 145.703 165.427 145.407C164.835 144.903 164.346 144.193 163.961 143.275C163.576 142.327 163.384 141.261 163.384 140.077C163.384 137.56 164.198 135.547 165.827 134.037C167.485 132.497 169.987 131.372 173.333 130.661C176.708 129.95 181.031 129.595 186.302 129.595C189.559 129.595 192.15 129.654 194.074 129.773C196.029 129.891 197.731 130.084 199.182 130.35Z"
                            fill="black" />
                    </svg>
                    <p class="leading-relaxed text-lg">In West Philadelphia born and raised
                        On the playground is where I spent most of my days
                        Chilling out, maxing, relaxing all cool
                        And all shooting some b-ball outside of the school
                        When a couple of guys who were up to no good
                        Started making trouble in my neighborhood
                        I got in one little fight and my mom got scared
                        And said "You're moving with your auntie and uncle in Bel-Air"
                    </p>
                    <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                    <h2 class="text-black font-medium title-font tracking-wider text-sm">WILL SMITH</h2>
                    <p class="text-black">The Fresh Prince Of Bel-Air</p>
                </div>
            </div>
        </section>
        <!--- Blog Section -->
        <section class="text-black  overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
                <div class="py-8 flex flex-wrap md:flex-no-wrap">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Our latest blog entries.
                    </h1>
                </div>
                <div class="text-black my-8">
                    <div class="py-8 flex flex-wrap md:flex-no-wrap">
                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                            <svg class="inline-block w-20 h-20 text-gray-700 mb-6" viewBox="0 0 312 311" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M92.5356 87.4287L153.536 80.8929L216.714 87.4287V187.643L157.893 224.679L92.5356 187.643V87.4287Z"
                                    fill="transparent" />
                                <path
                                    d="M92.065 84.1441L155.714 70L219.364 84.1441C221.084 84.5268 222.622 85.4839 223.725 86.8583C224.827 88.2327 225.429 89.9424 225.429 91.7046V169.064C225.428 176.715 223.539 184.247 219.928 190.993C216.317 197.739 211.097 203.489 204.731 207.732L155.714 240.412L106.698 207.732C100.332 203.489 95.1132 197.741 91.5021 190.996C87.8917 184.253 86.0019 176.721 86 169.072V91.7046C86 89.9424 86.6013 88.2327 87.7039 86.8583C88.8065 85.4839 90.345 84.5268 92.065 84.1441ZM101.492 97.9164V169.064C101.492 174.164 102.751 179.186 105.158 183.683C107.564 188.18 111.044 192.013 115.288 194.843L155.714 221.799L196.141 194.843C200.383 192.014 203.862 188.182 206.269 183.686C208.675 179.191 209.935 174.171 209.936 169.072V97.9164L155.714 85.8794L101.492 97.9164Z"
                                    fill="black" />
                                <path
                                    d="M166.324 148.027C167.005 148.027 167.494 148.175 167.79 148.471C168.116 148.767 168.279 149.152 168.279 149.626C168.279 150.396 168.042 151.077 167.568 151.669C167.124 152.261 166.413 152.572 165.436 152.602C163.097 152.632 160.995 152.454 159.129 152.069C157.056 156.481 154.554 160.152 151.623 163.084C148.721 165.986 145.849 167.436 143.007 167.436C140.401 167.436 138.447 166.06 137.144 163.306C135.841 160.523 135.101 156.806 134.923 152.158C133.146 157.31 131.133 161.144 128.883 163.661C126.662 166.178 124.293 167.436 121.776 167.436C118.934 167.436 116.787 165.675 115.336 162.151C113.885 158.598 113.16 153.831 113.16 147.85C113.16 143.497 113.545 138.715 114.315 133.504C114.522 132.023 114.892 131.002 115.425 130.439C115.988 129.847 116.861 129.551 118.045 129.551C118.934 129.551 119.615 129.743 120.089 130.128C120.592 130.513 120.844 131.224 120.844 132.26C120.844 132.467 120.814 132.867 120.755 133.459C119.866 139.529 119.422 144.696 119.422 148.96C119.422 152.928 119.763 155.992 120.444 158.154C121.125 160.315 122.043 161.396 123.198 161.396C124.234 161.396 125.478 160.315 126.928 158.154C128.409 155.963 129.875 152.735 131.325 148.471C132.776 144.178 134.005 139.07 135.012 133.148C135.249 131.786 135.678 130.853 136.3 130.35C136.951 129.817 137.825 129.551 138.92 129.551C139.838 129.551 140.505 129.758 140.919 130.172C141.363 130.557 141.585 131.15 141.585 131.949C141.585 132.423 141.556 132.793 141.496 133.059C140.667 137.886 140.253 142.712 140.253 147.539C140.253 150.825 140.356 153.446 140.564 155.4C140.801 157.354 141.23 158.85 141.852 159.886C142.503 160.893 143.436 161.396 144.65 161.396C146.071 161.396 147.655 160.33 149.402 158.198C151.149 156.037 152.748 153.357 154.199 150.159C152.393 149.034 151.031 147.583 150.113 145.806C149.195 144 148.736 141.928 148.736 139.588C148.736 137.249 149.091 135.28 149.802 133.681C150.542 132.053 151.534 130.839 152.778 130.039C154.051 129.24 155.457 128.84 156.997 128.84C158.892 128.84 160.388 129.521 161.483 130.883C162.608 132.245 163.171 134.111 163.171 136.479C163.171 139.825 162.445 143.541 160.995 147.627C162.505 147.894 164.281 148.027 166.324 148.027ZM153.222 139.277C153.222 142.179 154.155 144.326 156.02 145.718C157.175 142.401 157.752 139.662 157.752 137.501C157.752 136.257 157.589 135.354 157.264 134.792C156.938 134.199 156.494 133.903 155.931 133.903C155.132 133.903 154.48 134.377 153.977 135.325C153.474 136.242 153.222 137.56 153.222 139.277ZM199.182 130.35C200.1 130.528 200.781 130.839 201.225 131.283C201.699 131.727 201.936 132.245 201.936 132.837C201.936 133.814 201.655 134.525 201.092 134.969C200.559 135.413 199.7 135.591 198.516 135.502C195.851 135.295 193.764 135.162 192.253 135.102C190.773 135.014 188.819 134.954 186.391 134.925C185.295 140.373 184.288 145.851 183.371 151.358C183.045 153.372 182.704 155.711 182.349 158.376C181.994 161.011 181.757 163.143 181.638 164.772C181.579 165.63 181.224 166.296 180.572 166.77C179.921 167.214 179.136 167.436 178.218 167.436C177.241 167.436 176.486 167.2 175.953 166.726C175.42 166.252 175.154 165.63 175.154 164.86C175.154 164.15 175.257 162.98 175.465 161.352C175.702 159.693 175.968 157.961 176.264 156.155C176.59 154.349 176.842 152.78 177.019 151.447C177.345 149.197 177.715 146.961 178.13 144.74C178.544 142.52 178.959 140.417 179.373 138.434C179.462 137.989 179.566 137.486 179.684 136.923C179.803 136.331 179.936 135.68 180.084 134.969C177.182 135.058 174.902 135.295 173.244 135.68C171.586 136.065 170.401 136.613 169.691 137.323C169.01 138.004 168.669 138.893 168.669 139.988C168.669 140.995 168.965 141.957 169.558 142.875C169.676 143.082 169.735 143.304 169.735 143.541C169.735 144.104 169.395 144.637 168.714 145.14C168.062 145.614 167.381 145.851 166.671 145.851C166.167 145.851 165.753 145.703 165.427 145.407C164.835 144.903 164.346 144.193 163.961 143.275C163.576 142.327 163.384 141.261 163.384 140.077C163.384 137.56 164.198 135.547 165.827 134.037C167.485 132.497 169.987 131.372 173.333 130.661C176.708 129.95 181.031 129.595 186.302 129.595C189.559 129.595 192.15 129.654 194.074 129.773C196.029 129.891 197.731 130.084 199.182 130.35Z"
                                    fill="black" />
                            </svg>
                            <span class="tracking-widest font-medium title-font">CATEGORY</span>
                            <span class="mt-1 text-sm">12 Jun 2019</span>
                        </div>
                        <div class="md:flex-grow">
                            <h2 class="text-2xl font-medium text-black title-font mb-2">THIS IS THE TITLE FOR YOUR BLOG
                                POST</h2>
                            <p class="leading-relaxed">The new 185-square-metre home, which is occupied by a young
                                family of four, has linear massing and a gabled titanium-zinc roof, emulating the shape
                                of traditional agricultural buildings that dot the rural outskirts of Bratislava..</p>
                            <a class="text-black-7000 inline-flex items-center mt-4">Learn More
                                »
                            </a>
                        </div>
                    </div>
                    <div class="py-8 flex border-t-2 border-gray-200 flex-wrap md:flex-no-wrap">
                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                            <svg class="inline-block w-20 h-20 text-gray-700 mb-6" viewBox="0 0 312 311" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M92.5356 87.4287L153.536 80.8929L216.714 87.4287V187.643L157.893 224.679L92.5356 187.643V87.4287Z"
                                    fill="transparent" />
                                <path
                                    d="M92.065 84.1441L155.714 70L219.364 84.1441C221.084 84.5268 222.622 85.4839 223.725 86.8583C224.827 88.2327 225.429 89.9424 225.429 91.7046V169.064C225.428 176.715 223.539 184.247 219.928 190.993C216.317 197.739 211.097 203.489 204.731 207.732L155.714 240.412L106.698 207.732C100.332 203.489 95.1132 197.741 91.5021 190.996C87.8917 184.253 86.0019 176.721 86 169.072V91.7046C86 89.9424 86.6013 88.2327 87.7039 86.8583C88.8065 85.4839 90.345 84.5268 92.065 84.1441ZM101.492 97.9164V169.064C101.492 174.164 102.751 179.186 105.158 183.683C107.564 188.18 111.044 192.013 115.288 194.843L155.714 221.799L196.141 194.843C200.383 192.014 203.862 188.182 206.269 183.686C208.675 179.191 209.935 174.171 209.936 169.072V97.9164L155.714 85.8794L101.492 97.9164Z"
                                    fill="black" />
                                <path
                                    d="M166.324 148.027C167.005 148.027 167.494 148.175 167.79 148.471C168.116 148.767 168.279 149.152 168.279 149.626C168.279 150.396 168.042 151.077 167.568 151.669C167.124 152.261 166.413 152.572 165.436 152.602C163.097 152.632 160.995 152.454 159.129 152.069C157.056 156.481 154.554 160.152 151.623 163.084C148.721 165.986 145.849 167.436 143.007 167.436C140.401 167.436 138.447 166.06 137.144 163.306C135.841 160.523 135.101 156.806 134.923 152.158C133.146 157.31 131.133 161.144 128.883 163.661C126.662 166.178 124.293 167.436 121.776 167.436C118.934 167.436 116.787 165.675 115.336 162.151C113.885 158.598 113.16 153.831 113.16 147.85C113.16 143.497 113.545 138.715 114.315 133.504C114.522 132.023 114.892 131.002 115.425 130.439C115.988 129.847 116.861 129.551 118.045 129.551C118.934 129.551 119.615 129.743 120.089 130.128C120.592 130.513 120.844 131.224 120.844 132.26C120.844 132.467 120.814 132.867 120.755 133.459C119.866 139.529 119.422 144.696 119.422 148.96C119.422 152.928 119.763 155.992 120.444 158.154C121.125 160.315 122.043 161.396 123.198 161.396C124.234 161.396 125.478 160.315 126.928 158.154C128.409 155.963 129.875 152.735 131.325 148.471C132.776 144.178 134.005 139.07 135.012 133.148C135.249 131.786 135.678 130.853 136.3 130.35C136.951 129.817 137.825 129.551 138.92 129.551C139.838 129.551 140.505 129.758 140.919 130.172C141.363 130.557 141.585 131.15 141.585 131.949C141.585 132.423 141.556 132.793 141.496 133.059C140.667 137.886 140.253 142.712 140.253 147.539C140.253 150.825 140.356 153.446 140.564 155.4C140.801 157.354 141.23 158.85 141.852 159.886C142.503 160.893 143.436 161.396 144.65 161.396C146.071 161.396 147.655 160.33 149.402 158.198C151.149 156.037 152.748 153.357 154.199 150.159C152.393 149.034 151.031 147.583 150.113 145.806C149.195 144 148.736 141.928 148.736 139.588C148.736 137.249 149.091 135.28 149.802 133.681C150.542 132.053 151.534 130.839 152.778 130.039C154.051 129.24 155.457 128.84 156.997 128.84C158.892 128.84 160.388 129.521 161.483 130.883C162.608 132.245 163.171 134.111 163.171 136.479C163.171 139.825 162.445 143.541 160.995 147.627C162.505 147.894 164.281 148.027 166.324 148.027ZM153.222 139.277C153.222 142.179 154.155 144.326 156.02 145.718C157.175 142.401 157.752 139.662 157.752 137.501C157.752 136.257 157.589 135.354 157.264 134.792C156.938 134.199 156.494 133.903 155.931 133.903C155.132 133.903 154.48 134.377 153.977 135.325C153.474 136.242 153.222 137.56 153.222 139.277ZM199.182 130.35C200.1 130.528 200.781 130.839 201.225 131.283C201.699 131.727 201.936 132.245 201.936 132.837C201.936 133.814 201.655 134.525 201.092 134.969C200.559 135.413 199.7 135.591 198.516 135.502C195.851 135.295 193.764 135.162 192.253 135.102C190.773 135.014 188.819 134.954 186.391 134.925C185.295 140.373 184.288 145.851 183.371 151.358C183.045 153.372 182.704 155.711 182.349 158.376C181.994 161.011 181.757 163.143 181.638 164.772C181.579 165.63 181.224 166.296 180.572 166.77C179.921 167.214 179.136 167.436 178.218 167.436C177.241 167.436 176.486 167.2 175.953 166.726C175.42 166.252 175.154 165.63 175.154 164.86C175.154 164.15 175.257 162.98 175.465 161.352C175.702 159.693 175.968 157.961 176.264 156.155C176.59 154.349 176.842 152.78 177.019 151.447C177.345 149.197 177.715 146.961 178.13 144.74C178.544 142.52 178.959 140.417 179.373 138.434C179.462 137.989 179.566 137.486 179.684 136.923C179.803 136.331 179.936 135.68 180.084 134.969C177.182 135.058 174.902 135.295 173.244 135.68C171.586 136.065 170.401 136.613 169.691 137.323C169.01 138.004 168.669 138.893 168.669 139.988C168.669 140.995 168.965 141.957 169.558 142.875C169.676 143.082 169.735 143.304 169.735 143.541C169.735 144.104 169.395 144.637 168.714 145.14C168.062 145.614 167.381 145.851 166.671 145.851C166.167 145.851 165.753 145.703 165.427 145.407C164.835 144.903 164.346 144.193 163.961 143.275C163.576 142.327 163.384 141.261 163.384 140.077C163.384 137.56 164.198 135.547 165.827 134.037C167.485 132.497 169.987 131.372 173.333 130.661C176.708 129.95 181.031 129.595 186.302 129.595C189.559 129.595 192.15 129.654 194.074 129.773C196.029 129.891 197.731 130.084 199.182 130.35Z"
                                    fill="black" />
                            </svg>
                            <span class="tracking-widest font-medium title-font">CATEGORY</span>
                            <span class="mt-1 text-sm">12 Jun 2019</span>
                        </div>
                        <div class="md:flex-grow">
                            <h2 class="text-2xl font-medium text-black title-font mb-2">THIS IS THE TITLE FOR YOUR BLOG
                            POST</h2>
                            <p class="leading-relaxed">The new 185-square-metre home, which is occupied by a young
                                family of four, has linear massing and a gabled titanium-zinc roof, emulating the shape
                                of traditional agricultural buildings that dot the rural outskirts of Bratislava..</p>
                            <a class="text-black-7000 inline-flex items-center mt-4">Learn More
                                »
                            </a>
                        </div>
                    </div>
                    <div class="py-8 flex border-t-2 border-gray-300 flex-wrap md:flex-no-wrap">
                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                        <svg class="inline-block w-20 h-20 text-gray-700 mb-6" viewBox="0 0 312 311" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M92.5356 87.4287L153.536 80.8929L216.714 87.4287V187.643L157.893 224.679L92.5356 187.643V87.4287Z"
                                fill="transparent" />
                            <path
                                d="M92.065 84.1441L155.714 70L219.364 84.1441C221.084 84.5268 222.622 85.4839 223.725 86.8583C224.827 88.2327 225.429 89.9424 225.429 91.7046V169.064C225.428 176.715 223.539 184.247 219.928 190.993C216.317 197.739 211.097 203.489 204.731 207.732L155.714 240.412L106.698 207.732C100.332 203.489 95.1132 197.741 91.5021 190.996C87.8917 184.253 86.0019 176.721 86 169.072V91.7046C86 89.9424 86.6013 88.2327 87.7039 86.8583C88.8065 85.4839 90.345 84.5268 92.065 84.1441ZM101.492 97.9164V169.064C101.492 174.164 102.751 179.186 105.158 183.683C107.564 188.18 111.044 192.013 115.288 194.843L155.714 221.799L196.141 194.843C200.383 192.014 203.862 188.182 206.269 183.686C208.675 179.191 209.935 174.171 209.936 169.072V97.9164L155.714 85.8794L101.492 97.9164Z"
                                fill="black" />
                            <path
                                d="M166.324 148.027C167.005 148.027 167.494 148.175 167.79 148.471C168.116 148.767 168.279 149.152 168.279 149.626C168.279 150.396 168.042 151.077 167.568 151.669C167.124 152.261 166.413 152.572 165.436 152.602C163.097 152.632 160.995 152.454 159.129 152.069C157.056 156.481 154.554 160.152 151.623 163.084C148.721 165.986 145.849 167.436 143.007 167.436C140.401 167.436 138.447 166.06 137.144 163.306C135.841 160.523 135.101 156.806 134.923 152.158C133.146 157.31 131.133 161.144 128.883 163.661C126.662 166.178 124.293 167.436 121.776 167.436C118.934 167.436 116.787 165.675 115.336 162.151C113.885 158.598 113.16 153.831 113.16 147.85C113.16 143.497 113.545 138.715 114.315 133.504C114.522 132.023 114.892 131.002 115.425 130.439C115.988 129.847 116.861 129.551 118.045 129.551C118.934 129.551 119.615 129.743 120.089 130.128C120.592 130.513 120.844 131.224 120.844 132.26C120.844 132.467 120.814 132.867 120.755 133.459C119.866 139.529 119.422 144.696 119.422 148.96C119.422 152.928 119.763 155.992 120.444 158.154C121.125 160.315 122.043 161.396 123.198 161.396C124.234 161.396 125.478 160.315 126.928 158.154C128.409 155.963 129.875 152.735 131.325 148.471C132.776 144.178 134.005 139.07 135.012 133.148C135.249 131.786 135.678 130.853 136.3 130.35C136.951 129.817 137.825 129.551 138.92 129.551C139.838 129.551 140.505 129.758 140.919 130.172C141.363 130.557 141.585 131.15 141.585 131.949C141.585 132.423 141.556 132.793 141.496 133.059C140.667 137.886 140.253 142.712 140.253 147.539C140.253 150.825 140.356 153.446 140.564 155.4C140.801 157.354 141.23 158.85 141.852 159.886C142.503 160.893 143.436 161.396 144.65 161.396C146.071 161.396 147.655 160.33 149.402 158.198C151.149 156.037 152.748 153.357 154.199 150.159C152.393 149.034 151.031 147.583 150.113 145.806C149.195 144 148.736 141.928 148.736 139.588C148.736 137.249 149.091 135.28 149.802 133.681C150.542 132.053 151.534 130.839 152.778 130.039C154.051 129.24 155.457 128.84 156.997 128.84C158.892 128.84 160.388 129.521 161.483 130.883C162.608 132.245 163.171 134.111 163.171 136.479C163.171 139.825 162.445 143.541 160.995 147.627C162.505 147.894 164.281 148.027 166.324 148.027ZM153.222 139.277C153.222 142.179 154.155 144.326 156.02 145.718C157.175 142.401 157.752 139.662 157.752 137.501C157.752 136.257 157.589 135.354 157.264 134.792C156.938 134.199 156.494 133.903 155.931 133.903C155.132 133.903 154.48 134.377 153.977 135.325C153.474 136.242 153.222 137.56 153.222 139.277ZM199.182 130.35C200.1 130.528 200.781 130.839 201.225 131.283C201.699 131.727 201.936 132.245 201.936 132.837C201.936 133.814 201.655 134.525 201.092 134.969C200.559 135.413 199.7 135.591 198.516 135.502C195.851 135.295 193.764 135.162 192.253 135.102C190.773 135.014 188.819 134.954 186.391 134.925C185.295 140.373 184.288 145.851 183.371 151.358C183.045 153.372 182.704 155.711 182.349 158.376C181.994 161.011 181.757 163.143 181.638 164.772C181.579 165.63 181.224 166.296 180.572 166.77C179.921 167.214 179.136 167.436 178.218 167.436C177.241 167.436 176.486 167.2 175.953 166.726C175.42 166.252 175.154 165.63 175.154 164.86C175.154 164.15 175.257 162.98 175.465 161.352C175.702 159.693 175.968 157.961 176.264 156.155C176.59 154.349 176.842 152.78 177.019 151.447C177.345 149.197 177.715 146.961 178.13 144.74C178.544 142.52 178.959 140.417 179.373 138.434C179.462 137.989 179.566 137.486 179.684 136.923C179.803 136.331 179.936 135.68 180.084 134.969C177.182 135.058 174.902 135.295 173.244 135.68C171.586 136.065 170.401 136.613 169.691 137.323C169.01 138.004 168.669 138.893 168.669 139.988C168.669 140.995 168.965 141.957 169.558 142.875C169.676 143.082 169.735 143.304 169.735 143.541C169.735 144.104 169.395 144.637 168.714 145.14C168.062 145.614 167.381 145.851 166.671 145.851C166.167 145.851 165.753 145.703 165.427 145.407C164.835 144.903 164.346 144.193 163.961 143.275C163.576 142.327 163.384 141.261 163.384 140.077C163.384 137.56 164.198 135.547 165.827 134.037C167.485 132.497 169.987 131.372 173.333 130.661C176.708 129.95 181.031 129.595 186.302 129.595C189.559 129.595 192.15 129.654 194.074 129.773C196.029 129.891 197.731 130.084 199.182 130.35Z"
                                fill="black" />
                        </svg>
                            <span class="tracking-widest font-medium title-font">CATEGORY</span>
                            <span class="mt-1 text-sm">12 Jun 2019</span>
                        </div>
                        <div class="md:flex-grow">
                            <h2 class="text-2xl font-medium text-black title-font mb-2">THIS IS THE TITLE FOR YOUR BLOG
                            POST
                            </h2>
                            <p class="leading-relaxed">The new 185-square-metre home, which is occupied by a young
                                family of four, has linear massing and a gabled titanium-zinc roof, emulating the shape
                                of traditional agricultural buildings that dot the rural outskirts of Bratislava..</p>
                            <a class="text-black-7000 inline-flex items-center mt-4">Learn More
                                »
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!---Global Footer-->
        <footer class="text-black sm:content-center border-t border-gray-300">
            <div class="bg-white">
                <div class="container text-center lg:px-5 lg:py-6 mx-auto flex items-center sm:flex-row flex-col mb-2">
                    <a href="https://wickedtemplates.com?ref=molokini"
                        class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                        <svg width="80" height="80" viewBox="0 0 312 311" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="156" cy="155.5" r="155.5" fill="white"></circle>
                            <path
                                d="M92.5356 87.4287L153.536 80.8929L216.714 87.4287V187.643L157.893 224.679L92.5356 187.643V87.4287Z"
                                fill="white"></path>
                            <path
                                d="M92.065 84.1441L155.714 70L219.364 84.1441C221.084 84.5268 222.622 85.4839 223.725 86.8583C224.827 88.2327 225.429 89.9424 225.429 91.7046V169.064C225.428 176.715 223.539 184.247 219.928 190.993C216.317 197.739 211.097 203.489 204.731 207.732L155.714 240.412L106.698 207.732C100.332 203.489 95.1132 197.741 91.5021 190.996C87.8917 184.253 86.0019 176.721 86 169.072V91.7046C86 89.9424 86.6013 88.2327 87.7039 86.8583C88.8065 85.4839 90.345 84.5268 92.065 84.1441ZM101.492 97.9164V169.064C101.492 174.164 102.751 179.186 105.158 183.683C107.564 188.18 111.044 192.013 115.288 194.843L155.714 221.799L196.141 194.843C200.383 192.014 203.862 188.182 206.269 183.686C208.675 179.191 209.935 174.171 209.936 169.072V97.9164L155.714 85.8794L101.492 97.9164Z"
                                fill="#0a165c"></path>
                            <path
                                d="M166.324 148.027C167.005 148.027 167.494 148.175 167.79 148.471C168.116 148.767 168.279 149.152 168.279 149.626C168.279 150.396 168.042 151.077 167.568 151.669C167.124 152.261 166.413 152.572 165.436 152.602C163.097 152.632 160.995 152.454 159.129 152.069C157.056 156.481 154.554 160.152 151.623 163.084C148.721 165.986 145.849 167.436 143.007 167.436C140.401 167.436 138.447 166.06 137.144 163.306C135.841 160.523 135.101 156.806 134.923 152.158C133.146 157.31 131.133 161.144 128.883 163.661C126.662 166.178 124.293 167.436 121.776 167.436C118.934 167.436 116.787 165.675 115.336 162.151C113.885 158.598 113.16 153.831 113.16 147.85C113.16 143.497 113.545 138.715 114.315 133.504C114.522 132.023 114.892 131.002 115.425 130.439C115.988 129.847 116.861 129.551 118.045 129.551C118.934 129.551 119.615 129.743 120.089 130.128C120.592 130.513 120.844 131.224 120.844 132.26C120.844 132.467 120.814 132.867 120.755 133.459C119.866 139.529 119.422 144.696 119.422 148.96C119.422 152.928 119.763 155.992 120.444 158.154C121.125 160.315 122.043 161.396 123.198 161.396C124.234 161.396 125.478 160.315 126.928 158.154C128.409 155.963 129.875 152.735 131.325 148.471C132.776 144.178 134.005 139.07 135.012 133.148C135.249 131.786 135.678 130.853 136.3 130.35C136.951 129.817 137.825 129.551 138.92 129.551C139.838 129.551 140.505 129.758 140.919 130.172C141.363 130.557 141.585 131.15 141.585 131.949C141.585 132.423 141.556 132.793 141.496 133.059C140.667 137.886 140.253 142.712 140.253 147.539C140.253 150.825 140.356 153.446 140.564 155.4C140.801 157.354 141.23 158.85 141.852 159.886C142.503 160.893 143.436 161.396 144.65 161.396C146.071 161.396 147.655 160.33 149.402 158.198C151.149 156.037 152.748 153.357 154.199 150.159C152.393 149.034 151.031 147.583 150.113 145.806C149.195 144 148.736 141.928 148.736 139.588C148.736 137.249 149.091 135.28 149.802 133.681C150.542 132.053 151.534 130.839 152.778 130.039C154.051 129.24 155.457 128.84 156.997 128.84C158.892 128.84 160.388 129.521 161.483 130.883C162.608 132.245 163.171 134.111 163.171 136.479C163.171 139.825 162.445 143.541 160.995 147.627C162.505 147.894 164.281 148.027 166.324 148.027ZM153.222 139.277C153.222 142.179 154.155 144.326 156.02 145.718C157.175 142.401 157.752 139.662 157.752 137.501C157.752 136.257 157.589 135.354 157.264 134.792C156.938 134.199 156.494 133.903 155.931 133.903C155.132 133.903 154.48 134.377 153.977 135.325C153.474 136.242 153.222 137.56 153.222 139.277ZM199.182 130.35C200.1 130.528 200.781 130.839 201.225 131.283C201.699 131.727 201.936 132.245 201.936 132.837C201.936 133.814 201.655 134.525 201.092 134.969C200.559 135.413 199.7 135.591 198.516 135.502C195.851 135.295 193.764 135.162 192.253 135.102C190.773 135.014 188.819 134.954 186.391 134.925C185.295 140.373 184.288 145.851 183.371 151.358C183.045 153.372 182.704 155.711 182.349 158.376C181.994 161.011 181.757 163.143 181.638 164.772C181.579 165.63 181.224 166.296 180.572 166.77C179.921 167.214 179.136 167.436 178.218 167.436C177.241 167.436 176.486 167.2 175.953 166.726C175.42 166.252 175.154 165.63 175.154 164.86C175.154 164.15 175.257 162.98 175.465 161.352C175.702 159.693 175.968 157.961 176.264 156.155C176.59 154.349 176.842 152.78 177.019 151.447C177.345 149.197 177.715 146.961 178.13 144.74C178.544 142.52 178.959 140.417 179.373 138.434C179.462 137.989 179.566 137.486 179.684 136.923C179.803 136.331 179.936 135.68 180.084 134.969C177.182 135.058 174.902 135.295 173.244 135.68C171.586 136.065 170.401 136.613 169.691 137.323C169.01 138.004 168.669 138.893 168.669 139.988C168.669 140.995 168.965 141.957 169.558 142.875C169.676 143.082 169.735 143.304 169.735 143.541C169.735 144.104 169.395 144.637 168.714 145.14C168.062 145.614 167.381 145.851 166.671 145.851C166.167 145.851 165.753 145.703 165.427 145.407C164.835 144.903 164.346 144.193 163.961 143.275C163.576 142.327 163.384 141.261 163.384 140.077C163.384 137.56 164.198 135.547 165.827 134.037C167.485 132.497 169.987 131.372 173.333 130.661C176.708 129.95 181.031 129.595 186.302 129.595C189.559 129.595 192.15 129.654 194.074 129.773C196.029 129.891 197.731 130.084 199.182 130.35Z"
                                fill="#0a165c"></path>
                        </svg>
                    </a>
                    <p class="text-sm text-gray-600 font-bold sm:ml-6 sm:mt-0 mt-4">
                        HTML RESPONSIVE TEMPLATES READY TO CUSTOMIZE OUT OF THE BOX.
                    </p>
                    <p class="text-sm text-gray-600 font-bold sm:ml-6 sm:mt-0 mt-4">
                        <!--- Twitter -->
                        <a class="" rel="noopener" target="_blank" href="https://twitter.com/WickedTemplates">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 3C9.10457 3 10 3.89543 10 5V8H16C17.1046 8 18 8.89543 18 10C18 11.1046 17.1046 12 16 12H10V14C10 15.6569 11.3431 17 13 17H16C17.1046 17 18 17.8954 18 19C18 20.1046 17.1046 21 16 21H13C9.13401 21 6 17.866 6 14V5C6 3.89543 6.89543 3 8 3Z"
                                    fill="#0a165c"></path>
                            </svg>
                        </a>
                    </p>
                    <p class="text-sm text-gray-600 font-bold sm:ml-6 sm:mt-0 mt-4">
                        <!--- Twitter -->
                        <!--- Indiehackers -->
                        <a class="" rel="noopener" target="_blank" href="https://www.indiehackers.com/group/wicked-templates">
                            <svg width="24" height="18" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.48075 0H0.0961304V19H4.48075V0Z" fill="#0a165c"></path>
                                <path d="M13.25 0H8.86542V19H13.25V0Z" fill="#0a165c"></path>
                                <path d="M20.5576 7.30771H12.5192V11.6923H20.5576V7.30771Z" fill="#0a165c"></path>
                                <path d="M24.2115 0H19.8269V19H24.2115V0Z" fill="#0a165c"></path>
                            </svg></a>
                    </p>
                    <span
                        class="text-sm text-gray-600 font-bold inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                        © WICKED TEMPLATES 2019 - 2020
                    </span>
                </div>
            </div>
        </footer>
        <!--- End Global Footer-->
    </body>
</html>
