@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3>Website Settings</h3>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.settings.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Website Name
                        </label>

                        <input type="text"
                               name="site_name"
                               value="{{ $setting->site_name ?? '' }}"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Contact Email
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ $setting->email ?? '' }}"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Phone
                        </label>

                        <input type="text"
                               name="phone"
                               value="{{ $setting->phone ?? '' }}"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Currency
                        </label>

                        <input type="text"
                               name="currency"
                               value="{{ $setting->currency ?? 'USD' }}"
                               class="form-control">

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Address
                        </label>

                        <textarea name="address"
                                  rows="3"
                                  class="form-control">{{ $setting->address ?? '' }}</textarea>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Logo
                        </label>

                        <input type="file"
                               name="logo"
                               class="form-control">

                        @if(!empty($setting->logo))
                            <img src="{{ asset($setting->logo) }}"
                                 width="120"
                                 class="mt-2">
                        @endif

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Favicon
                        </label>

                        <input type="file"
                               name="favicon"
                               class="form-control">

                        @if(!empty($setting->favicon))
                            <img src="{{ asset($setting->favicon) }}"
                                 width="40"
                                 class="mt-2">
                        @endif

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Facebook URL
                        </label>

                        <input type="text"
                               name="facebook"
                               value="{{ $setting->facebook ?? '' }}"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            YouTube URL
                        </label>

                        <input type="text"
                               name="youtube"
                               value="{{ $setting->youtube ?? '' }}"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Discord URL
                        </label>

                        <input type="text"
                               name="discord"
                               value="{{ $setting->discord ?? '' }}"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Instagram URL
                        </label>

                        <input type="text"
                               name="instagram"
                               value="{{ $setting->instagram ?? '' }}"
                               class="form-control">

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Footer Text
                        </label>

                        <textarea name="footer_text"
                                  rows="3"
                                  class="form-control">{{ $setting->footer_text ?? '' }}</textarea>

                    </div>

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Save Settings

                </button>

            </form>

        </div>

    </div>

</div>

@endsection