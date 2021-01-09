<style>
    .custom-shape-divider-top-1609233651 .shape-fill {
        fill: rgba(6, 95, 70);
    }
    .bg-custom {
        background: rgba(6, 95, 70);
    }
</style>
<x-dashboard-app>
    <!-- Main Content Start  -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <main class="flex-1 overflow-x-hidden overflow-y-auto py-10 bg-gray-100">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-gray-700 text-3xl font-medium my-10">Dashboard</h3>
                <div class="mt-4">
                    <div class="flex flex-wrap -mx-6">
                        <!-- Start of statistics cards -->
                        <a href="{{ route('non-purchased-products') }}" class="w-full px-6 sm:w-1/2 xl:w-1/3">
                            <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                    <svg class="h-8 w-8 text-white" viewBox="0 0 28 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>

                                <div class="mx-5">
                                    @foreach($nonServicedProducts as $key => $value)
                                        <h4 class="text-2xl font-semibold text-gray-700">
                                            {{ $value }}
                                        </h4>
                                        <div class="text-gray-500">
                                            {{ $key }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </a>

                        <a href="" class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                            <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                                    <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.19999 1.4C3.4268 1.4 2.79999 2.02681 2.79999 2.8C2.79999 3.57319 3.4268 4.2 4.19999 4.2H5.9069L6.33468 5.91114C6.33917 5.93092 6.34409 5.95055 6.34941 5.97001L8.24953 13.5705L6.99992 14.8201C5.23602 16.584 6.48528 19.6 8.97981 19.6H21C21.7731 19.6 22.4 18.9732 22.4 18.2C22.4 17.4268 21.7731 16.8 21 16.8H8.97983L10.3798 15.4H19.6C20.1303 15.4 20.615 15.1004 20.8521 14.6261L25.0521 6.22609C25.2691 5.79212 25.246 5.27673 24.991 4.86398C24.7357 4.45123 24.2852 4.2 23.8 4.2H8.79308L8.35818 2.46044C8.20238 1.83722 7.64241 1.4 6.99999 1.4H4.19999Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M22.4 23.1C22.4 24.2598 21.4598 25.2 20.3 25.2C19.1403 25.2 18.2 24.2598 18.2 23.1C18.2 21.9402 19.1403 21 20.3 21C21.4598 21 22.4 21.9402 22.4 23.1Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M9.1 25.2C10.2598 25.2 11.2 24.2598 11.2 23.1C11.2 21.9402 10.2598 21 9.1 21C7.9402 21 7 21.9402 7 23.1C7 24.2598 7.9402 25.2 9.1 25.2Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>

                                <div class="mx-5">
                                    @foreach($nonServicedOrders as $key => $value)
                                        <h4 class="text-2xl font-semibold text-gray-700">
                                            {{ $value }}
                                        </h4>
                                        <div class="text-gray-500">
                                            {{ $key }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                        <!-- End of statistics cards -->
                    </div>
                </div>
    
                <div class="mt-8"></div>

                <div class="flex flex-row flex-wrap flex-grow mt-2">
                    <!-- display graph if user is a seller -->
                    <div class="w-full md:w-1/2 p-3">
                        <!--Graph Card-->
                            <div class="bg-white border rounded shadow">
                                <div class="border-b p-3">
                                    <h5 class="font-bold uppercase text-gray-600">Earnings</h5>
                                </div>
                                <div class="p-5">
                                    <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                                    <script>
                                        new Chart(document.getElementById("chartjs-0"), {
                                            "type": "line",
                                            "data": {
                                                "labels": ["January", "February", "March", 
                                                            "April", "May", "June", "July", 
                                                            "August", "September", "October",
                                                            "November", "December"],
                                                "datasets": [{
                                                    "label": "Money earned/Month",
                                                    "data": [65, 59, 80, 81, 56, 55, 40, 30, 40, 60, 65, 0],
                                                    "fill": false,
                                                    "borderColor": "rgb(75, 192, 192)",
                                                    "lineTension": 0.1
                                                }]
                                            },
                                            "options": {}
                                        });
                                    </script>
                                </div>
                            </div>
                        <!--/Graph Card-->
                    </div>
                    <div class="w-full md:w-1/2 p-3">
                        <!-- Recent Activity Card -->
                            <div class="bg-white border rounded shadow">
                                <div class="border-b p-3">
                                    <h5 class="font-bold uppercase text-gray-600">Recent Activity</h5>
                                </div>
                                <div class="p-5">
                                    You have no recent activities
                                </div>
                            </div>
                        <!-- /Recent Activity Card -->
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Main Content End -->
</x-dashboard-app>
