<footer class="footer">
            <p class="text-center pt-3 mb-0">CAO ĐẲNG FPT POLYTECHNIC TÂY NGUYÊN</p>
            <p class="text-center mb-0">Copyright by : Phan Thanh Hoá - PK02909 - Buôn Mê Thuột</p>
            <p class="text-center pb-3 mb-0">Email: hoaptpk02909@fpt.edu.vn</p>
          </footer>

        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Thêm thư viện Pusher -->
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<!-- Kịch bản JavaScript để lắng nghe thông báo từ Pusher -->
<script>
  Pusher.logToConsole = true;

  var pusher = new Pusher('ebd4b083a7bb57c525d6', {
    cluster: 'ap1'
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
    document.querySelector('.new--notification-overlay').classList.add('active');
  });

  channel.bind('cancel_order', function(data) {
    document.querySelector('.cancel__notification--overlay').classList.add('active');
  });
</script>

</html>