<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">{{ $title }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @isset($parent)
                    <li class="breadcrumb-item"><a href="{{ route($parent['route']) }}">{{ $parent['label'] }}</a></li>
                @endisset
                <li class="breadcrumb-item text-white" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
    </div>
</div>
