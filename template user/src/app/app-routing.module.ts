import { AcceuilComponent } from './components/acceuil/acceuil.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { MagasinComponent } from './components/magasin/magasin.component';
import { AboutComponent } from './components/about/about.component';
import { ContactComponent } from './components/contact/contact.component';
import { CategoriesComponent } from './components/categories/categories.component';
import { PartenairesComponent } from './components/partenaires/partenaires.component';

const routes: Routes = [
  {
    path:'',
    redirectTo:'acceuil',
    pathMatch:'full'
  },
  {
    path:'acceuil',
    component:AcceuilComponent
  },
  {
    path:'categories',
    component:CategoriesComponent
  },
  {
    path:'magasin',
    component:MagasinComponent
  },
  {
    path:'about',
    component:AboutComponent
  },
  {
    path:'partenaires',
    component:PartenairesComponent
  },
  {
    path:'contact',
    component:ContactComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
