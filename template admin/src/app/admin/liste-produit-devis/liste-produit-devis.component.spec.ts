import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeProduitDevisComponent } from './liste-produit-devis.component';

describe('ListeProduitDevisComponent', () => {
  let component: ListeProduitDevisComponent;
  let fixture: ComponentFixture<ListeProduitDevisComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListeProduitDevisComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListeProduitDevisComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
