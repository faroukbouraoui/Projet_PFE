import { Component, OnInit } from '@angular/core';
import { AdminService } from '../../services/admin.service';

@Component({
  selector: 'app-gestion-produits',
  templateUrl: './gestion-produits.component.html',
  styleUrls: ['./gestion-produits.component.scss']
})
export class GestionProduitsComponent implements OnInit {

  listProduits = []

  constructor(private _as: AdminService) {

  }

  ngOnInit() {
    this._as.getAllProducts().subscribe(
      res => {
        console.log(res);
        
        this.listProduits = res ;

      },
      err => {
        console.log(err);

      }
    )
  }



}
