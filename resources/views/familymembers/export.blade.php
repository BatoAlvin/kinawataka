
<table>
    <tr>
      <th>Names</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Address</th>
    </tr>
    @foreach($familymember as $familymembers)
    <tr>
      <td>{{$familymembers->family_name}}</td>
      <td>{{$familymembers->email}}</td>
      <td>{{$familymembers->contact}}</td>
      <td>{{$familymembers->location}}</td>
    </tr>
@endforeach
  </table>
