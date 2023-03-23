
<table>
    <tr>
      <th>Names</th>
      <th>Savings Amount</th>
      <th>Description</th>
      <th>Date</th>
    </tr>
    @foreach($savingsummary as $savingsummaries)
    <tr>
      <td>{{$savingsummaries->member->family_name}}</td>
      <td>{{$savingsummaries->amount}}</td>
      <td>{{$savingsummaries->description}}</td>
      <td>{{$savingsummaries->date}}</td>
    </tr>
@endforeach
  </table>
