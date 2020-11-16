                       <a @click="open=true"  class="btn btn-success">Ajouter compte Epargne</a>
  <div  v-if="open">
                    <h4 >Ajout Compte Epargne</h4>

          <div class="form-group">
          <label for="">Prenom</label>
          <input type="text" name="prenom" class="form-control"  v-model="CompteEpargne.prenom">
               

          </div>

          <div class="form-group ">
          <label for="">Solde</label>
          <input type="number" name="solde" class="form-control" v-model="CompteEpargne.solde" >


          </div>

          
          <div class="form-group">
          
          <input type="submit"    class="form-control btn btn-success" @click="addCompteEpargne" value="Enregistrer" >
          </div>
     
   
                    </section>
                  </div>