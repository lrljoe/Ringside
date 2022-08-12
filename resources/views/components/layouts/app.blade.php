<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        @livewireStyles
    </head>
    <body id="kt_app_body" class="app-default" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true">
        <div id="kt_app_root" class="d-flex flex-column flex-root app-root">
            <div id="kt_app_page" class="app-page flex-column flex-column-fluid">
                @include('partials.header')

                <div id="kt_app_wrapper" class="app-wrapper flex-column flex-row-fluid">
                    @include('partials.aside')
                    <div id="kt_app_main" class="app-main flex-column flex-row-fluid">
                        <div class="d-flex flex-column flex-column-fluid">
                            {{ $toolbar }}

                            <div id="kt_app_content" class="app-content flex-column-fluid">
                                <div id="kt_app_content_container" class="app-container container-fluid">
                                    {{ $slot }}
                                </div>
                            </div>

                        </div>
                        <div id="kt_app_footer" class="app-footer">
							<!--begin::Footer container-->
							<div class="py-3 app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack">
								<!--begin::Copyright-->
								<div class="order-2 text-dark order-md-1">
									<span class="text-muted fw-semibold me-1">2022©</span>
									<span class="text-gray-800">Jeffrey Davidson</span>
								</div>
								<!--end::Copyright-->
							</div>
							<!--end::Footer container-->
						</div>
                    </div>
                </div>
            </div>
        </div>

		<script>var hostUrl = "assets/";</script>
		<script src="{{ asset('assets/js/app.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
        @livewireScripts
    </body>
</html>
