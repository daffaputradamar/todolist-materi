import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { ITodo } from '../ITodo';

@Component({
  selector: 'app-todo-item',
  templateUrl: './todo-item.component.html',
  styleUrls: ['./todo-item.component.css']
})
export class TodoItemComponent implements OnInit {
  @Input() todo: ITodo;
  @Output() deleteTodo = new EventEmitter<string>();
  @Output() updateTodo = new EventEmitter<ITodo>();

  constructor() { }

  ngOnInit() {
  }

  update(id) {
    this.updateTodo.emit({id, todo: this.todo.todo, isCompleted: !this.todo.isCompleted})
  }
  
  delete(id) {
    this.deleteTodo.emit(id)
  }

}
