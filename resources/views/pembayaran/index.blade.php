<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-DQmY2ZpFpy71HGBZ"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
  </head>
 
  <body>
    @php
      foreach($pemesanan as $row)
      {
          $params['item_details'][] = array (  
              'id' => $row->id,
              'price' => $row->harga,
              'quantity' => $row->jumlah_pemesanan,
              'name' => $row->product->rasa
          );
      }
      $snapToken = \Midtrans\Snap::getSnapToken($params);
    @endphp
    <h3><button id="pay-button">Bayar!</button></h3>
 
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}');
        // customer will be redirected after completing payment pop-up
      });
    </script>
  </body>
</html>