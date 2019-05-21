import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { LocationStrategy, HashLocationStrategy } from '@angular/common';

import { PerfectScrollbarModule } from 'ngx-perfect-scrollbar';
import { PERFECT_SCROLLBAR_CONFIG } from 'ngx-perfect-scrollbar';
import { PerfectScrollbarConfigInterface } from 'ngx-perfect-scrollbar';

const DEFAULT_PERFECT_SCROLLBAR_CONFIG: PerfectScrollbarConfigInterface = {
  suppressScrollX: true
};

import { AppComponent } from './app.component';

// Import containers
import { DefaultLayoutComponent } from './containers';

import { P404Component } from './views/error/404.component';
import { P500Component } from './views/error/500.component';
import { LoginComponent } from './views/login/login.component';
import { RegisterComponent } from './views/register/register.component';

const APP_CONTAINERS = [
  DefaultLayoutComponent
];

import {
  AppAsideModule,
  AppBreadcrumbModule,
  AppHeaderModule,
  AppFooterModule,
  AppSidebarModule,
} from '@coreui/angular';

// Import routing module
import { AppRoutingModule } from './app.routing';

// Import 3rd party components
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';
import { TabsModule } from 'ngx-bootstrap/tabs';
import { ChartsModule } from 'ng2-charts/ng2-charts';
import { ProfileComponent } from './admin/profile/profile.component';

import { GestionComptesComponent } from './admin/gestion-comptes/gestion-comptes.component';
import { GestionCommandeComponent } from './admin/gestion-commande/gestion-commande.component';
import { GestionProduitsComponent } from './admin/gestion-produits/gestion-produits.component';
import { DevisComponent } from './admin/devis/devis.component';
import { AjoutProduitComponent } from './admin/ajout-produit/ajout-produit.component';
import { ModifierProduitComponent } from './admin/modifier-produit/modifier-produit.component';
import { ListeProduitComponent } from './admin/liste-produit/liste-produit.component';
import { ModifierCommandeComponent } from './admin/modifier-commande/modifier-commande.component';
import { ListeProduitDevisComponent } from './admin/liste-produit-devis/liste-produit-devis.component';
import { HttpClientModule } from '@angular/common/http';
import { AdminService } from './services/admin.service';



@NgModule({
  imports: [
    BrowserModule,
    AppRoutingModule,
    AppAsideModule,
    AppBreadcrumbModule.forRoot(),
    AppFooterModule,
    AppHeaderModule,
    AppSidebarModule,
    PerfectScrollbarModule,
    BsDropdownModule.forRoot(),
    TabsModule.forRoot(),
    ChartsModule,
    HttpClientModule
  ],
  declarations: [
    AppComponent,
    ...APP_CONTAINERS,
    P404Component,
    P500Component,
    LoginComponent,
    RegisterComponent,
    ProfileComponent,
    GestionProduitsComponent,
    GestionComptesComponent,
    GestionCommandeComponent,
    DevisComponent,
    AjoutProduitComponent,
    ModifierProduitComponent,
    ListeProduitComponent,
    ModifierCommandeComponent,
    ListeProduitDevisComponent,
  
    
  ],
  providers: [{
    provide: LocationStrategy,
    useClass: HashLocationStrategy

  },
  AdminService
],
  bootstrap: [ AppComponent ]
})
export class AppModule { }
