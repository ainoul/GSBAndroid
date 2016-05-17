package fr.yamishadow.gsbandroid;


import android.util.Log;

import org.json.JSONObject;
import org.json.JSONException;
import org.json.JSONArray;

/**
 * Created by Ainoul on 14/12/2015.
 */
public class Connexion {

    // création de l'objet d'accès à distance
// avec redéfinition à la volée de la méthode onPostExecute
    AccesHTTP accesDonnees = new AccesHTTP() {
        @Override
        protected void onPostExecute(Long result) {
            try {
                // ret contient l'information récupérée au format json
                // donc récupération dans un tableau json
                JSONArray tJson = new JSONArray(this.ret);
                // test si on a récupéré quelque chose
                if (tJson.length() != 0) {
                    // on peut traiter les informations
                    // par exemple si chaque ligne contient un tableau
// associatif on peut récupérer, dans la ième ligne,
                    // la case "age" :
                    String age = tJson.getJSONObject(i).getString("age");
                }
            } catch (JSONException e) {
                Log.d("log", "pb decodage JSON " + e.toString());
            }
        }

    };
    accesDonnees.addParam("op","recup");
    accesDonnees.execute("http://192.168.43.245/coach/serveurcoach.php");


}
