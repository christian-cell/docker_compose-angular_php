import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class ClientesService {

  constructor(private http: HttpClient ) { }

  getClients(){
    return this.http.get(environment.url + "clientes.php");
  }
}
