<?php
require './aside-menu.php';

?>
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Dashboard </h2>
            <p>Welcome <?=$_SESSION['user-first-name']?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-local_library"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Total Offers</h6>
                        <span>20002324</span>
                        <span class="text-sm">
                            books available for exchange
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-star"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Total Whishes</h6> <span>32324</span>
                        <span class="text-sm">
                            number of books users desire to have
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-check_circle"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Completed Exchange</h6> <span>1203</span>
                        <span class="text-sm">
                            have been successfully completed
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-info-light"><i class="text-info material-icons md-report"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Reports</h6> <span>17</span>
                        <span class="text-sm">
                            users reported
                        </span>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="card mb-4">
        <header class="card-header">
            <h4 class="card-title">Latest exchange history</h4>
            <div class="row align-items-center">
                <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                    <div class="custom_select">
                        <select class="form-select select-nice">
                            <option selected>All Categories</option>
                            <option>Women's Clothing</option>
                            <option>Men's Clothing</option>
                            <option>Cellphones</option>
                            <option>Computer & Office</option>
                            <option>Consumer Electronics</option>
                            <option>Jewelry & Accessories</option>
                            <option>Home & Garden</option>
                            <option>Luggage & Bags</option>
                            <option>Shoes</option>
                            <option>Mother & Kids</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <input type="date" value="02.05.2022" class="form-control">
                </div>
                <div class="col-md-2 col-6">
                    <div class="custom_select">
                        <select class="form-select select-nice">
                            <option selected>Status</option>
                            <option>All</option>
                            <option>Paid</option>
                            <option>Chargeback</option>
                            <option>Refund</option>
                        </select>
                    </div>
                </div>
            </div>
        </header>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-center">
                                    <div class="form-check align-middle">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                        <label class="form-check-label" for="transactionCheck01"></label>
                                    </div>
                                </th>
                                <th class="align-middle" scope="col">request_id</th>
                                <th class="align-middle" scope="col">exchange_id</th>
                                <th class="align-middle" scope="col">Date</th>
                                <th class="align-middle" scope="col">Total</th>
                                <th class="align-middle" scope="col">Payment Status</th>
                                <th class="align-middle" scope="col">Payment Method</th>
                                <th class="align-middle" scope="col">View Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                        <label class="form-check-label" for="transactionCheck02"></label>
                                    </div>
                                </td>
                                <td><a href="#" class="fw-bold">#SK2540</a> </td>
                                <td>Neal Matthews</td>
                                <td>
                                    07 Oct, 2022
                                </td>
                                <td>
                                    $400
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-soft-success">Paid</span>
                                </td>
                                <td>
                                    <i class="material-icons md-payment font-xxl text-muted mr-5"></i> Mastercard
                                </td>
                                <td>
                                    <a href="#" class="btn btn-xs"> View details</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck03">
                                        <label class="form-check-label" for="transactionCheck03"></label>
                                    </div>
                                </td>
                                <td><a href="#" class="fw-bold">#SK2541</a> </td>
                                <td>Jamal Burnett</td>
                                <td>
                                    07 Oct, 2022
                                </td>
                                <td>
                                    $380
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-soft-danger">Chargeback</span>
                                </td>
                                <td>
                                    <i class="material-icons md-payment font-xxl text-muted mr-5"></i> Visa
                                </td>
                                <td>
                                    <a href="#" class="btn btn-xs"> View details</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck04">
                                        <label class="form-check-label" for="transactionCheck04"></label>
                                    </div>
                                </td>
                                <td><a href="#" class="fw-bold">#SK2542</a> </td>
                                <td>Juan Mitchell</td>
                                <td>
                                    06 Oct, 2022
                                </td>
                                <td>
                                    $384
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-soft-success">Paid</span>
                                </td>
                                <td>
                                    <i class="material-icons md-payment font-xxl text-muted mr-5"></i> Paypal
                                </td>
                                <td>
                                    <a href="#" class="btn btn-xs"> View details</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck05">
                                        <label class="form-check-label" for="transactionCheck05"></label>
                                    </div>
                                </td>
                                <td><a href="#" class="fw-bold">#SK2543</a> </td>
                                <td>Barry Dick</td>
                                <td>
                                    05 Oct, 2022
                                </td>
                                <td>
                                    $412
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-soft-success">Paid</span>
                                </td>
                                <td>
                                    <i class="material-icons md-payment font-xxl text-muted mr-5"></i> Mastercard
                                </td>
                                <td>
                                    <a href="#" class="btn btn-xs"> View details</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck06">
                                        <label class="form-check-label" for="transactionCheck06"></label>
                                    </div>
                                </td>
                                <td><a href="#" class="fw-bold">#SK2544</a> </td>
                                <td>Ronald Taylor</td>
                                <td>
                                    04 Oct, 2022
                                </td>
                                <td>
                                    $404
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-soft-warning">Refund</span>
                                </td>
                                <td>
                                    <i class="material-icons md-payment font-xxl text-muted mr-5"></i> Visa
                                </td>
                                <td>
                                    <a href="#" class="btn btn-xs"> View details</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="transactionCheck07">
                                        <label class="form-check-label" for="transactionCheck07"></label>
                                    </div>
                                </td>
                                <td><a href="#" class="fw-bold">#SK2545</a> </td>
                                <td>Jacob Hunter</td>
                                <td>
                                    04 Oct, 2022
                                </td>
                                <td>
                                    $392
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-soft-success">Paid</span>
                                </td>
                                <td>
                                    <i class="material-icons md-payment font-xxl text-muted mr-5"></i> Paypal
                                </td>
                                <td>
                                    <a href="#" class="btn btn-xs"> View details</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
    <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">16</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
            </ul>
        </nav>
    </div>
</section> 
</main>
<script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
<script src="assets/js/vendors/select2.min.js"></script>
<script src="assets/js/vendors/perfect-scrollbar.js"></script>
<script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
<script src="assets/js/vendors/chart.js"></script>

<script src="assets/js/main.js" type="text/javascript"></script>
<script src="assets/js/custom-chart.js" type="text/javascript"></script>
</body>

</html>