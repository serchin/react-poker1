<div class="price-area bg-area pt_50 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $heading->home_pricing }}</h2>
                    <hr class="line">
                </div>
            </div>
        </div>
        <div class="row pricing-tables">
            @foreach($pricing as $package)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="pricing-table table-left">
                    <div class="icon">
                        <i class="fa {{ $package->icon }}"></i>
                    </div>
                    <div class="pricing-details">
                        <h2>{{ $package->title }}</h2>
                        <span>{{ $package->price }}</span>
                        <ul>
                            @foreach($pricingfeatures->where('package_id', $package->id) as $pricingfeature)
                            <li>{{ $pricingfeature->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="plan-button">
                        <a href="{{ route('contact') }}" class="btn btn-common">Get Plan</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--Pricing Table End-->
