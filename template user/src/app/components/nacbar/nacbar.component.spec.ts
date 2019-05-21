import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NacbarComponent } from './nacbar.component';

describe('NacbarComponent', () => {
  let component: NacbarComponent;
  let fixture: ComponentFixture<NacbarComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NacbarComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NacbarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
