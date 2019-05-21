import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// Import Containers
import { DefaultLayoutComponent } from './containers';

import { P404Component } from './views/error/404.component';
import { P500Component } from './views/error/500.component';
import { LoginComponent } from './views/login/login.component';
import { RegisterComponent } from './views/register/register.component';
import { ProfileComponent } from './admin/profile/profile.component';
import { GestionProduitsComponent } from './admin/gestion-produits/gestion-produits.component';
import { GestionComptesComponent } from './admin/gestion-comptes/gestion-comptes.component';
import { GestionCommandeComponent } from './admin/gestion-commande/gestion-commande.component';
import { DevisComponent } from './admin/devis/devis.component';
import { AjoutProduitComponent } from './admin/ajout-produit/ajout-produit.component';
import { ModifierProduitComponent } from './admin/modifier-produit/modifier-produit.component';
import { ListeProduitComponent } from './admin/liste-produit/liste-produit.component';
import { ModifierCommandeComponent } from './admin/modifier-commande/modifier-commande.component';
import { ListeProduitDevisComponent } from './admin/liste-produit-devis/liste-produit-devis.component';

export const routes: Routes = [
  {
    path: '',
    redirectTo: 'login',
    pathMatch: 'full',
  },
  {
    path: '404',
    component: P404Component,
    data: {
      title: 'Page 404'
    }
  },
  {
    path: '500',
    component: P500Component,
    data: {
      title: 'Page 500'
    }
  },
  {
    path: 'login',
    component: LoginComponent,
    data: {
      title: 'Login Page'
    }
  },
  {
    path: 'register',
    component: RegisterComponent,
    data: {
      title: 'Register Page'
    }
  },
  {
    path: '',
    component: DefaultLayoutComponent,
    data: {
      title: 'Home'
    },
    children: [
      {
        path: 'profile',
        component:ProfileComponent,
        data: {
          title: 'Profile'
        }
      },
      {
        path: 'gestion-produits',
        component:GestionProduitsComponent,
        data: {
          title: 'Gestion Produits'
        }
      },
      {
        path: 'gestion-comptes',
        component:GestionComptesComponent,
        data: {
          title: 'Gestion Comptes'
        }
      },
      {
        path: 'gestion-commandes',
        component:GestionCommandeComponent,
        data: {
          title: 'Gestion Commandes'
        }
      },
      {
        path: 'gestion-devis',
        component:DevisComponent,
        data: {
          title: 'Gestion Devis'
        }
      },
      {
        path: 'ajout-produit',
        component:AjoutProduitComponent,
        data: {
          title: 'Ajouter Produit'
        }
      },
      {
        path: 'modifier-produit',
        component:ModifierProduitComponent,
        data: {
          title: 'Modifier Produit'
        }
      },
      {
        path: 'liste-produit',
        component:ListeProduitComponent,
        data: {
          title: 'Liste Produit'
        }
      },
      {
        path: 'modifier-commande',
        component:ModifierCommandeComponent,
        data: {
          title: 'Modifier commande'
        }
      },
      {
        path: 'liste-produit-devis',
        component:ListeProduitDevisComponent,
        data: {
          title: 'liste des produits de devis'
        }
      },
      {
        path: 'base',
        loadChildren: './views/base/base.module#BaseModule'
      },
      {
        path: 'buttons',
        loadChildren: './views/buttons/buttons.module#ButtonsModule'
      },
      {
        path: 'charts',
        loadChildren: './views/chartjs/chartjs.module#ChartJSModule'
      },
      {
        path: 'dashboard',
        loadChildren: './views/dashboard/dashboard.module#DashboardModule'
      },
      {
        path: 'icons',
        loadChildren: './views/icons/icons.module#IconsModule'
      },
      {
        path: 'notifications',
        loadChildren: './views/notifications/notifications.module#NotificationsModule'
      },
      {
        path: 'theme',
        loadChildren: './views/theme/theme.module#ThemeModule'
      },
      {
        path: 'widgets',
        loadChildren: './views/widgets/widgets.module#WidgetsModule'
      }
    ]
  },
  { path: '**', component: P404Component }
];

@NgModule({
  imports: [ RouterModule.forRoot(routes) ],
  exports: [ RouterModule ]
})
export class AppRoutingModule {}
