import { Component, OnInit } from '@angular/core';
import { ClientesService } from 'src/app/shared/services/clientes.service';

@Component({
  selector: 'app-clientes',
  templateUrl: './clientes.component.html',
  styleUrls: ['./clientes.component.scss']
})
export class ClientesComponent implements OnInit {
  clientes :any ;
  constructor(private clientesService: ClientesService) { }

  ngOnInit(): void {
    this.CargarClientes();
  }

  CargarClientes(){
    this.clientesService.getClients().subscribe((res:any) => {
      this.clientes = res;
      console.log(this.clientes);
    })
  }

}
