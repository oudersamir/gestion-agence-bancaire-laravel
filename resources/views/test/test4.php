<form action="'.url('Comptes/'.$row->id_comptes).'" method="post">
'. csrf_field() .'
                       
       <input type="hidden" name="_method" value="DELETE">
                     <a href="'.url('Comptes').'"  class="btn btn-info">Detail</a>

                     <a href="'.url('Comptes/'.$row->id_comptes.'/Edit_Compte').'"  class="btn btn-success">Editer</a>
                     <button type="submit"  class="btn btn-danger">Supprimer</button>
                     </form>




                      <script  type="text/javascript" src="{{asset('assets/js/jquery.bootpag.min.js')}}"></script>

  <script src="{{asset('assets/js/jquery-1.11.3-jquery.min.js')}}"></script> 