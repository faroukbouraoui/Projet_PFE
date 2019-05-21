import { Component, OnInit } from '@angular/core';
import { AllService } from 'src/app/services/all.service';
import { Route, Router } from '@angular/router';
import { Category } from 'src/app/shared/Category';
import { Product } from 'src/app/shared/Product';

@Component({
  selector: 'app-magasin',
  templateUrl: './magasin.component.html',
  styleUrls: ['./magasin.component.css']
})
export class MagasinComponent implements OnInit {

  categories: Category[];
  products: Product[];

  constructor(private service: AllService) { }

  ngOnInit() {
    this.service.getAllCategories().subscribe(
      data => this.categories = data,
    );
    this.service.getAllProducts().subscribe(
      data => this.products = data
    );
  }

  getProductsByCategorie(id: number) {
    this.service.getProductsByCategory(id).subscribe(
      data => this.products = data
    );
  }

 
}
