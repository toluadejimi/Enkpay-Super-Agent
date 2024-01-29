@extends('layout.home')
@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100 bg-info-subtle overflow-hidden shadow-none">
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="rounded-circle overflow-hidden me-6">
                                        <img src="{{url('')}}/public/assets2/images/profile/user-1.jpg" alt="" width="40" height="40">
                                    </div>
                                    <h5 class="fw-semibold mb-0 fs-5">Welcome back {{Auth::user()->first_name}}!</h5>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="border-end pe-4 border-muted border-opacity-10">
                                        <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">₦{{ number_format(Auth::user()->main_wallet, 2) }}<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                        <p class="mb-0 text-dark">Main Wallet</p>
                                    </div>
                                    <div class="ps-4">
                                        <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">{{ number_format($customers) }}<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                        <p class="mb-0 text-dark">Registred Customers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="welcome-bg-img text-end">
                                    <img src="{{url('')}}/public/assets2/images/backgrounds/welcome-bg.svg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">

                <div class="row">
                    <div class="col-3 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <h4 class="fw-semibold text-success">₦{{number_format($total_in_transaction ,2)}}</h4>
                                <p class="mb-2 fs-3">Total IN Transaction</p>
                            </div>
                        </div>

                    </div>

                     <div class="col-3 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <h4 class="fw-semibold text-danger">₦{{number_format($total_out_transaction ,2)}}</h4>
                                <p class="mb-2 fs-3">Total OUT Transaction</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-3 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <h4 class="fw-semibold">₦{{number_format($total_in_month_transaction ,2)}}</h4>
                                <p class="mb-1 fs-3">Total IN this month</p>
                            </div>
                        </div>
                    </div>



                    <div class="col-3 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <h4 class="fw-semibold">₦{{number_format($total_out_month_transaction ,2)}}</h4>
                                <p class="mb-1 fs-3">Total OUT this month</p>
                            </div>
                        </div>
                    </div>

                   

                </div>


            </div>



            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card">

                    <div class="card-body">

                        <div class="card-heading">

                            <h6>Recent Transactions</h6>
                        </div>


                        <div class="table-responsive mb-4">
                            <table class="table border text-nowrap customize-table mb-0 align-middle">
                                  <thead class="text-dark fs-4">
                                <tr>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Refrence Number</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Customer Name</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Debit</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Credit</h6>
                                    </th>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Balance</h6>
                                    </th>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Type</h6>
                                    </th>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Agent Fee</h6>
                                    </th>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                    </th>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Date / Time</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($transactions as $data)

                                <tr>

                                    <td>{{$data->ref_trans_id}}</td>
                                    <td>{{$data->user->first_name}} {{$data->user->last_name}}</td>
                                    <td>₦{{number_format($data->debit ,2)}}</td>
                                    <td>₦{{number_format($data->credit ,2)}}</td>
                                    <td>₦{{number_format($data->balance ,2)}}</td>
                                    <td>
                                        @if($data->transaction_type == 'PURCHASE')
                                        <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            PURCHASE
                                        </span>
                                         @elseif($data->transaction_type == 'Purchase')
                                        <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            PURCHASE
                                        </span>
                                        @elseif($data->transaction_type == 'VirtualFundWallet')
                                        <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            WALLET FUNDING
                                        </span>
                                        @elseif($data->transaction_type == 'BankTransfer')
                                        <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-up-thin"></iconify-icon>
                                            BANK TRANSFER
                                        </span>
                                        @elseif($data->transaction_type == 'CashOut')
                                        <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            CASH OUT
                                        </span>

                                        @elseif($data->transaction_type == 'EP TRANSFER')
                                        <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            EP TRANSFER
                                        </span>
                                        @endif



                                    </td>

                                    <td>₦{{number_format($data->e_charges ,2)}}</td>

                                    <td>
                                        @if($data->status == 1)
                                        <span class="badge bg-success-subtle rounded-3 py-2 text-success fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="fluent-mdl2:check-mark"></iconify-icon>
                                            Successful
                                        </span>
                                        @else
                                        @endif

                                    </td>


                                    <td>{{$data->created_at}}</td>








                                </tr>

                                @empty

                                <tr>
                                    No record found
                                </tr>

                                @endforelse

                            </tbody>


                                {{ $transactions->links() }}
                            </table>

                        </div>


                    </div>



                </div>








            </div>
        </div>
    </div>
    <script>
        function handleColorTheme(e) {
            $("html").attr("data-color-theme", e);
            $(e).prop("checked", !0);
        }

    </script>
    <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="icon ti ti-settings fs-7"></i>
    </button>

    <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
            <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                Settings
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" data-simplebar style="height: calc(100vh - 80px)">
            <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <input type="radio" class="btn-check" name="theme-layout" id="light-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="light-layout"><i class="icon ti ti-brightness-up fs-7 me-2"></i>Light</label>

                <input type="radio" class="btn-check" name="theme-layout" id="dark-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="dark-layout"><i class="icon ti ti-moon fs-7 me-2"></i>Dark</label>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="ltr-layout"><i class="icon ti ti-text-direction-ltr fs-7 me-2"></i>LTR</label>

                <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="rtl-layout"><i class="icon ti ti-text-direction-rtl fs-7 me-2"></i>RTL</label>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

            <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
                <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                        <i class="ti ti-check text-white d-flex icon fs-5"></i>
                    </div>
                </label>

                <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                        <i class="ti ti-check text-white d-flex icon fs-5"></i>
                    </div>
                </label>

                <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                        <i class="ti ti-check text-white d-flex icon fs-5"></i>
                    </div>
                </label>

                <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Green_Theme')" for="green-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                        <i class="ti ti-check text-white d-flex icon fs-5"></i>
                    </div>
                </label>

                <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                        <i class="ti ti-check text-white d-flex icon fs-5"></i>
                    </div>
                </label>

                <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                        <i class="ti ti-check text-white d-flex icon fs-5"></i>
                    </div>
                </label>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <div>
                    <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="vertical-layout"><i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Vertical</label>
                </div>
                <div>
                    <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="horizontal-layout"><i class="icon ti ti-layout-navbar fs-7 me-2"></i>Horizontal</label>
                </div>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="boxed-layout"><i class="icon ti ti-layout-distribute-vertical fs-7 me-2"></i>Boxed</label>

                <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="full-layout"><i class="icon ti ti-layout-distribute-horizontal fs-7 me-2"></i>Full</label>
            </div>

            <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <a href="javascript:void(0)" class="fullsidebar">
                    <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="full-sidebar"><i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Full</label>
                </a>
                <div>
                    <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="mini-sidebar"><i class="icon ti ti-layout-sidebar fs-7 me-2"></i>Collapse</label>
                </div>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="card-with-border"><i class="icon ti ti-border-outer fs-7 me-2"></i>Border</label>

                <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="card-without-border"><i class="icon ti ti-border-none fs-7 me-2"></i>Shadow</label>
            </div>
        </div>
    </div>
</div>

<!--  Search Bar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-1">
            <div class="modal-header border-bottom">
                <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
                <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                    <i class="ti ti-x fs-5 ms-3"></i>
                </a>
            </div>
            <div class="modal-body message-body" data-simplebar="">
                <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                <ul class="list mb-0 py-2">
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                            <span class="fs-3 text-muted d-block">/apps/contacts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                            <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                            <span class="fs-3 text-muted d-block">/apps/contacts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="index2.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                            <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--  Shopping Cart -->
<div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header py-4">
        <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">
            Shopping Cart
        </h5>
        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
    </div>
    <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
        <ul class="mb-0">
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="{{url('')}}/public/assets2/images/products/product-1.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success" type="button" id="add1">
                                    -
                                </button>
                                <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="1" />
                                <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add" type="button" id="addo2">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="{{url('')}}/public/assets2/images/products/product-2.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success" type="button" id="add2">
                                    -
                                </button>
                                <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add2" value="1" />
                                <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add" type="button" id="addon34">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="{{url('')}}/public/assets2/images/products/product-3.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success" type="button" id="add3">
                                    -
                                </button>
                                <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add3" value="1" />
                                <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add" type="button" id="addon3">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="align-bottom">
            <div class="d-flex align-items-center pb-7">
                <span class="text-dark fs-3">Sub Total</span>
                <div class="ms-auto">
                    <span class="text-dark fw-semibold fs-3">$2530</span>
                </div>
            </div>
            <div class="d-flex align-items-center pb-7">
                <span class="text-dark fs-3">Total</span>
                <div class="ms-auto">
                    <span class="text-dark fw-semibold fs-3">$6830</span>
                </div>
            </div>
            <a href="eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
        </div>
    </div>
</div>

</div>
<div class="dark-transparent sidebartoggler"></div>
<!-- Import Js Files -->



@endsection
