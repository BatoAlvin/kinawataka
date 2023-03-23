
<table>
    <tr>
      <th>Names</th>
      <th>Savings Amount</th>
      <th>Description</th>
      <th>Date</th>
    </tr>
    @foreach($saving as $savings)
    <tr>
      <td>{{$savings->member->family_name}}</td>
      <td>{{$savings->amount}}</td>
      <td>{{$savings->description}}</td>
      <td>{{$savings->date}}</td>
    </tr>
@endforeach
  </table>
