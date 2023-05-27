
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © PT SINERGY TEKNOLOGI PBMTI.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                   Test coding
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset("assets/libs/jquery/jquery.min.js") }}"></script>
        <script src="{{ asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("assets/libs/metismenu/metisMenu.min.js") }}"></script>
        <script src="{{ asset("assets/libs/simplebar/simplebar.min.js") }}"></script>
        <script src="{{ asset("assets/libs/node-waves/waves.min.js") }}"></script>

        <script src="{{ asset("assets/libs/select2/js/select2.min.js") }}"></script>
        <script src="{{ asset("assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>
        <script src="{{ asset("assets/libs/spectrum-colorpicker2/spectrum.min.js") }}"></script>
        <script src="{{ asset("assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js") }}"></script>
        <script src="{{ asset("assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js") }}"></script>
        <script src="{{ asset("assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js") }}"></script>
        <script src="{{ asset("assets/libs/@chenfengyuan/datepicker/datepicker.min.js") }}"></script>

        <!-- Responsive examples -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


        <!-- form advanced init -->
        <script src="{{ asset("assets/js/pages/form-advanced.init.js") }}"></script>

        <script src="{{ asset("assets/js/app.js") }}"></script>
        @include('component.alert')

        @yield('script')
        
    </body>

</html>