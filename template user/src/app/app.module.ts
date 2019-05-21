import { AcceuilComponent } from './components/acceuil/acceuil.component';
import { AppRoutingModule } from './app-routing.module';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { CategoriesComponent } from './components/categories/categories.component';
import { MagasinComponent } from './components/magasin/magasin.component';
import { AboutComponent } from './components/about/about.component';
import { ContactComponent } from './components/contact/contact.component';
import { NacbarComponent } from './components/nacbar/nacbar.component';
import { FooterComponent } from './components/footer/footer.component';
import { PartenairesComponent } from './components/partenaires/partenaires.component';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { UserService } from './services/user.service';
import { HttpClientModule } from '@angular/common/http';

@NgModule({
  declarations: [
    AppComponent,
    AcceuilComponent,
    CategoriesComponent,
    MagasinComponent,
    AboutComponent,
    ContactComponent,
    NacbarComponent,
    FooterComponent,
    PartenairesComponent,
    LoginComponent,
    RegisterComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [UserService],
  bootstrap: [AppComponent]
})
export class AppModule { }
