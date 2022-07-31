<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{$recipe->clients_name . ' ' . $recipe->flavour . ' ' . $recipe->created_at}}</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .text-right {
            text-align: right;
        }

        .ingredients {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        .ingredients td,
        .ingredients th {
            border: 1px solid #000;
            padding: 5px;
        }
    </style>

</head>

<body>

    <table width="50%">
        <tr>
            <td><b>Client's Name</b></td>
            <td>: {{ $recipe->clients_name }}</td>
        </tr>
        <tr>
            <td><b>Flavour</b></td>
            <td>: {{ $recipe->flavour }}</td>
        </tr>
        <tr>
            <td><b>Nic Strength</b></td>
            <td>: {{ $recipe->nic_strength }} mg</td>
        </tr>
        <tr>
            <td><b>Volume</b></td>
            <td>: {{ $recipe->volume }} ml</td>
        </tr>
    </table>

    <br />

    <table width="100%" class="ingredients">
        <thead style="background-color: lightgray;">
            <tr>
                <th colspan="4">Ingredients</th>
                <th colspan="2">Price</th>
            </tr>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Percentage</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($recipe->recipeDetails as $recipeDetail)
            <tr>
                <td>{{ $recipeDetail->ingredients->name }}</td>
                <td>{{ $recipeDetail->brand }}</td>
                <td class="text-right">{{ $recipeDetail->percentage }} %</td>
                <td class="text-right">{{ $recipeDetail->qty }} ml</td>
                <td class="text-right">{{ rupiah($recipeDetail->price) }} /ml</td>
                <td class="text-right">{{ rupiah($recipe->volume * $recipeDetail->percentage / 100 * $recipeDetail->price) }}</td>
            </tr>
            @php $total += $recipe->volume * $recipeDetail->percentage / 100 * $recipeDetail->price; @endphp
            @endforeach
        </tbody>

        <tfoot>
            <tr class="text-right">
                <td colspan="5"><b>TOTAL</b></td>
                <td><b>{{ rupiah($total) }}</b></td>
            </tr>
        </tfoot>
    </table>

    <br>



    <table width="100%" class="ingredients">
        <thead style="background-color: lightgray;">
            <tr>
                <th colspan="4">Other Needs</th>
            </tr>
            <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @php $otherNeedTotal = 0; @endphp
            @foreach($recipe->otherNeeds as $otherNeed)
            <tr>
                <td>{{ $otherNeed->name }}</td>
                <td class="text-right">{{ $otherNeed->qty }}</td>
                <td class="text-right">{{ rupiah($otherNeed->price) }}</td>
                <td class="text-right">{{ rupiah($otherNeed->qty * $otherNeed->price) }}</td>
            </tr>
            @php $otherNeedTotal += $otherNeed->qty * $otherNeed->price; @endphp
            @endforeach
        </tbody>

        <tfoot>
        <tr class="text-right">
                <td colspan="3"><b>TOTAL</b></td>
                <td><b>{{ rupiah($otherNeedTotal) }}</b></td>
              </tr>
              <tr class="text-right">
                <td colspan="3"><b>CUKAI</b></td>
                <td><b>{{ rupiah($recipe->cukai) }}</b></td>
              </tr>
              @php $otherNeedTotal += $recipe->cukai; @endphp
              <tr class="text-right">
                <td colspan="3"><b>CONTINGENCY COST ({{$recipe->contingency_cost}}%)</b></td>
                <td><b>{{ rupiah(ceil(($total + $otherNeedTotal) * $recipe->contingency_cost / 100)) }}</b></td>
              </tr>
              @php $otherNeedTotal += ceil(($total + $otherNeedTotal) * $recipe->contingency_cost / 100); @endphp
              <tr class="text-right">
                <td colspan="3"><b>HPP TOTAL</b></td>
                <td><b>{{ rupiah($total + $otherNeedTotal) }}</b></td>
              </tr>
        </tfoot>
    </table>

</body>

</html>