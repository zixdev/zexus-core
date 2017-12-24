import  pages  from './+pages';
import  home  from './+home';
import  advanced  from './+advanced';
import  accounts  from './+accounts';
import  appearance  from './+appearance';

// https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Operators/Spread_operator
// Thus a new array is created, containing all objects that match the routes.
// ...dashboard must be the last one because of the catchall instruction
const Routes = [
    ...home,
    ...pages,
    ...accounts,
    ...appearance,
    ...advanced
];

Routes.map(route => {
   Zexus.routes.push(route)
});