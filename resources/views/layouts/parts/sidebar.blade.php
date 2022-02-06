<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>
                @foreach(config('menu') as $item)
                    @if(isset($item['dropdown']) && count($item['dropdown']))
                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="{{$item['icon']}}"></i>
                                <span key="t-dashboards">@lang($item['text'])</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                @foreach($item['dropdown'] as $drop)
                                    <li><a href="{{route($drop['route'])}}">@lang($drop['text'])</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>
                            <a class="waves-effect" href="{{ route($item['route']) }}">
                                <i class="{{ $item['icon'] }}"></i>
                                <span>
                               @lang($item['text'])
                            </span>
                            </a>
                        </li>
                    @endif

                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
