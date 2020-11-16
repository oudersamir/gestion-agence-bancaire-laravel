  @foreach($listcompte as $ct)
            <tr>
                <td> {{$ct->num_comptes}}</td>
                <td> {{$ct->date_ouverture}}</td>
                <td>  hhhh </td>
                <td>  {{$ct->compte_courant->num_compte_courant}}     </td>
               
                	<td>@foreach($ct->compte_epargne as $compte)  
                     {{$compte->prenom}}<br>
                     {{$compte->id_compte_epargnes}}<br>

                	@endforeach     </td>

                
                <td> 
                    
                     <form action="{{url('Comptes/'.$ct->id_comptes)}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                     <a href="{{url('Comptes/'.$ct->id_comptes.'/Edit_Compte')}}"  class="btn btn-success">Editer</a>
                     <button type="submit"  class="btn btn-danger">Supprimer</button>
                     </form>
                </td> 
            </tr>
            @endforeach