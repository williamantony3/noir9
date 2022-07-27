<html>
  
    <head>
      <style>
        ul{
          list-style: none;
        }
        .bodyDetail,.botomHeaderDetail, .topHeaderDetail, tr, .topHeader, .bottomHeader{
          text-align: center;
          border: 2px solid;
          border-color: black;
          padding: 15px;
          border-spacing: -1px;
        }
        .topHeader, .bottomHeader{
          background-color: rgb(140, 173, 173);
        }
        table{
          border-spacing: -1px;
          border: 2px solid;
          border-color: black; 
          border-spacing: -1px;
        }
        td{
           border-color: black;
           border-left: 2px solid; 
           border-spacing: -1px;
        }
        .total{
          text-align: right;
          border-spacing: -1px;
          border: 2px solid;
          border-color: black;
        }
        .totalAmount{
          background-color: rgb(140, 173, 173);
          border-spacing: -1px;
          border: 2px solid;
          border-color: black;
        }
        .finalTotalAmount{
          background-color: rgb(140, 173, 173);
          border-spacing: -1px;
          border: 2px solid;
          border-color: black;
          color: red;
          padding: 10px;
        }
      </style>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
      {{-- <link rel="stylesheet" href="/css/argon.min-v=1.0.0.css" type="text/css">
      <script src="/js/argon.min-v=1.0.0.js"></script> --}}
      
    </head>
    <body>
      <div class="container">
        <div class="clientDetail">
          <ul> 
            <li>Client's Name: Bobi</li>
            <li>Flavour: Banana</li>
            <li>Nic Strength (MG): 1000</li>
            <li>Volume (ML): 300</li>
          </ul>
        </div>
              <table>
                <thead>
                  <tr class="topHeader">
                    <th colspan="4" class="topHeaderDetail"> INGREDIENTS</th>
                    <th colspan="2" class="topHeaderDetail"> PRICE</th>
                  </tr>
                  <tr class="bottomHeader">
                    <th class="botomHeaderDetail">NAME</th>
                    <th class="botomHeaderDetail">BRAND</th>
                    <th class="botomHeaderDetail">PERCENTAGE</th>
                    <th class="botomHeaderDetail">Qty (ml)</th>
                    <th class="botomHeaderDetail">PRICE (/ML)</th>
                    <th class="botomHeaderDetail">TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="bodyDetail">VG</td>
                    <td class="bodyDetail">ECOCEROL</td>
                    <td class="bodyDetail">50,0%</td>
                    <td class="bodyDetail">15</td>
                    <td class="bodyDetail">Rp 65</td>
                    <td class="bodyDetail">Rp 975</td>
                  </tr>
                    {{-- @php
                        $rowNum = 1;
                    @endphp
                    @foreach ($ingredientsList as $ing)
                    <tr>
                    <td class="text-center">{{ $rowNum++ }} </td>
                    <td class="text-center">{{ $ing['name'] }}</td>
                    <td class="text-center">{{ $ing['price'] }}</td>
                    </tr>
                    
                  @endforeach --}}
                </tbody>
                <thead>
                  <tr>
                    <td colspan="5" class="total">Total</td>
                    <th class="totalAmount">Rp 123</th>
                  </tr>
                </thead>
              </table>
              <br>
              <br>
              <br>
              <table>
                <thead>
                  <tr class="topHeader">
                    <th colspan="4" class="topHeaderDetail">OTHER NEEDS</th>
                  </tr>
                  <tr class="bottomHeader">
                    <th class="botomHeaderDetail">NAME</th>
                    <th class="botomHeaderDetail">QUANTITY</th>
                    <th class="botomHeaderDetail">PRICE</th>
                    <th class="botomHeaderDetail">TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="bodyDetail">Botol</td>
                    <td class="bodyDetail">1</td>
                    <td class="bodyDetail">Rp 2000</td>
                    <td class="bodyDetail">Rp 2000</td>
                  </tr>
                </tbody>
                <thead>
                  <tr>
                    <td colspan="3" class="total">Total</td>
                    <th class="totalAmount">Rp 123</th>
                  </tr>
                </thead>
              </table>
              <br>
              <br>
              <table>
                <thead>
                  <tr>
                    <th class="finalTotalAmount">HPP Total</td>
                    <th class="finalTotalAmount">Rp 123</th>
                  </tr>
                </thead>
              </table>
        </div>
    </body>
</html>
        
