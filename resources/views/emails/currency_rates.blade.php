<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Currency Rates</title>
</head>
<body>
<h1>Currency Rates</h1>
<table>
    <thead>
    <tr>
        <th>Currency</th>
        <th>Rate</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($currencyRates as $currency => $rate)
    <tr>
        <td>{{ $currency }}</td>
        <td>{{ $rate }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
