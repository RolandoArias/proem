<!-- jQuery -->
    <script src="{{asset('asset/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('asset/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('asset/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('asset/vendors/nprogress/nprogress.js')}}"></script>    
    <!-- Chart.js -->
    <script src="{{asset('asset/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{asset('asset/vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- easy-pie-chart -->
    <script src="{{asset('asset/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('asset/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    
        
    <!-- GALERÍA -->
    <script src="{{asset('asset/js/jquery.magnific-popup.js')}}"></script>

    <!-- DRAG & DROP -->
    <script src="{{asset('asset/js/dragdrop.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('asset/build/js/custom.min.js')}}"></script>

  
    

    <!-- Galería -->
    <script>
      $('#gal16').magnificPopup({
          items: [
            {
              src: '{{asset('asset/images/img_producto_demo_1.jpg')}}'
            },
            {
              src: '{{asset('asset/images/img_producto_demo_2.jpg')}}',
            },
            {
              src: '{{asset('asset/images/img_producto_demo_3.jpg')}}',
            },
            {
              src: '{{asset('asset/images/img_producto_demo_4.jpg')}}',
            },
            {
              src: '{{asset('asset/images/img_producto_demo_5.jpg')}}',
            }      
          ],
          gallery: {
            enabled: true
          },
          type: 'image' 
      });
    </script>

    