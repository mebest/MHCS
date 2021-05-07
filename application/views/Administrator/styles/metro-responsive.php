<style>
    .flexbox {
  display: -webkit-flex;
  display: flex;
}
.flex-dir-row {
  -webkit-flex-direction: row;
          flex-direction: row;
}
.flex-dir-row-reverse {
  -webkit-flex-direction: row-reverse;
          flex-direction: row-reverse;
}
.flex-dir-column {
  -webkit-flex-direction: column;
          flex-direction: column;
}
.flex-dir-column-reverse {
  -webkit-flex-direction: column-reverse;
          flex-direction: column-reverse;
}
.flex-wrap {
  -webkit-flex-wrap: wrap;
          flex-wrap: wrap;
}
.flex-wrap-reverse {
  -webkit-flex-wrap: wrap-reverse;
          flex-wrap: wrap-reverse;
}
.flex-no-wrap {
  -webkit-flex-wrap: nowrap;
          flex-wrap: nowrap;
}
.flex-just-start {
  -webkit-justify-content: flex-start;
          justify-content: flex-start;
}
.flex-just-end {
  -webkit-justify-content: flex-end;
          justify-content: flex-end;
}
.flex-just-center {
  -webkit-justify-content: center;
          justify-content: center;
}
.flex-just-sa {
  -webkit-justify-content: space-around;
          justify-content: space-around;
}
.flex-just-sb {
  -webkit-justify-content: space-between;
          justify-content: space-between;
}
.flex-align-stretch {
  -webkit-align-items: stretch;
          align-items: stretch;
}
.flex-align-start {
  -webkit-align-items: flex-start;
          align-items: flex-start;
}
.flex-align-end {
  -webkit-align-items: flex-end;
          align-items: flex-end;
}
.flex-align-center {
  -webkit-align-items: center;
          align-items: center;
}
.flex-align-base {
  -webkit-align-items: baseline;
          align-items: baseline;
}
.flex-content-stretch {
  -webkit-align-content: stretch;
          align-content: stretch;
}
.flex-content-start {
  -webkit-align-content: flex-start;
          align-content: flex-start;
}
.flex-content-end {
  -webkit-align-content: flex-end;
          align-content: flex-end;
}
.flex-content-center {
  -webkit-align-content: center;
          align-content: center;
}
.flex-content-sb {
  -webkit-align-content: space-between;
          align-content: space-between;
}
.flex-content-sa {
  -webkit-align-content: space-around;
          align-content: space-around;
}
.flex-self-auto {
  -webkit-align-self: auto;
          align-self: auto;
}
.flex-self-start {
  -webkit-align-self: flex-start;
          align-self: flex-start;
}
.flex-self-end {
  -webkit-align-self: flex-end;
          align-self: flex-end;
}
.flex-self-center {
  -webkit-align-self: center;
          align-self: center;
}
.flex-self-base {
  -webkit-align-self: baseline;
          align-self: baseline;
}
.flex-self-stretch {
  -webkit-align-self: stretch;
          align-self: stretch;
}
.no-shrink {
  -webkit-flex-shrink: 0 !important;
          flex-shrink: 0 !important;
}
.no-grow {
  -webkit-flex-grow: 0 !important;
          flex-grow: 0 !important;
}
.flex-size-auto {
  -webkit-flex: 1 auto;
  flex: 1 auto;
}
.flex-size1 {
  -webkit-flex-grow: 1;
          flex-grow: 1;
}
.flex-size2 {
  -webkit-flex-grow: 2;
          flex-grow: 2;
}
.flex-size3 {
  -webkit-flex-grow: 3;
          flex-grow: 3;
}
.flex-size4 {
  -webkit-flex-grow: 4;
          flex-grow: 4;
}
.flex-size5 {
  -webkit-flex-grow: 5;
          flex-grow: 5;
}
.flex-size6 {
  -webkit-flex-grow: 6;
          flex-grow: 6;
}
.flex-size7 {
  -webkit-flex-grow: 7;
          flex-grow: 7;
}
.flex-size8 {
  -webkit-flex-grow: 8;
          flex-grow: 8;
}
.flex-size9 {
  -webkit-flex-grow: 9;
          flex-grow: 9;
}
.flex-size10 {
  -webkit-flex-grow: 10;
          flex-grow: 10;
}
.flex-size11 {
  -webkit-flex-grow: 11;
          flex-grow: 11;
}
.flex-size12 {
  -webkit-flex-grow: 12;
          flex-grow: 12;
}
.flex-size-p10 {
  -webkit-flex: 0 0 10%;
  flex: 0 0 10%;
}
.flex-size-p20 {
  -webkit-flex: 0 0 20%;
  flex: 0 0 20%;
}
.flex-size-p30 {
  -webkit-flex: 0 0 30%;
  flex: 0 0 30%;
}
.flex-size-p40 {
  -webkit-flex: 0 0 40%;
  flex: 0 0 40%;
}
.flex-size-p50 {
  -webkit-flex: 0 0 50%;
  flex: 0 0 50%;
}
.flex-size-p60 {
  -webkit-flex: 0 0 60%;
  flex: 0 0 60%;
}
.flex-size-p70 {
  -webkit-flex: 0 0 70%;
  flex: 0 0 70%;
}
.flex-size-p80 {
  -webkit-flex: 0 0 80%;
  flex: 0 0 80%;
}
.flex-size-p90 {
  -webkit-flex: 0 0 90%;
  flex: 0 0 90%;
}
.flex-size-p100 {
  -webkit-flex: 0 0 100%;
  flex: 0 0 100%;
}
.flex-size-x100 {
  -webkit-flex: 0 0 100px;
  flex: 0 0 100px;
}
.flex-size-x200 {
  -webkit-flex: 0 0 200px;
  flex: 0 0 200px;
}
.flex-size-x300 {
  -webkit-flex: 0 0 300px;
  flex: 0 0 300px;
}
.flex-size-x400 {
  -webkit-flex: 0 0 400px;
  flex: 0 0 400px;
}
.flex-size-x500 {
  -webkit-flex: 0 0 500px;
  flex: 0 0 500px;
}
.flex-size-x600 {
  -webkit-flex: 0 0 600px;
  flex: 0 0 600px;
}
.flex-size-x700 {
  -webkit-flex: 0 0 700px;
  flex: 0 0 700px;
}
.flex-size-x800 {
  -webkit-flex: 0 0 800px;
  flex: 0 0 800px;
}
.flex-size-x900 {
  -webkit-flex: 0 0 900px;
  flex: 0 0 900px;
}
.flex-size-x1000 {
  -webkit-flex: 0 0 1000px;
  flex: 0 0 1000px;
}
@media screen and (min-width: 1401px) {
  html {
    font-size: 120%;
  }
}
@media screen and (max-width: 1400px) {
  html {
    font-size: 110%;
  }
}
@media screen and (max-width: 1200px) {
  html {
    font-size: 100%;
  }
}
@media screen and (max-width: 768px) {
  html {
    font-size: 100%;
  }
}
@media screen and (max-width: 640px) {
  html {
    font-size: 90%;
  }
}
@media screen and (max-width: 320px) {
  html {
    font-size: 80%;
  }
}
@media screen and (max-width: 800px) {
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  p {
    margin: .625rem;
  }
}
@media screen and (min-width: 1401px) {
  .container {
    width: 1200px;
  }
}
@media screen and (max-width: 992px) {
  .container {
    width: 100%;
    padding: 10px;
  }
}
@media screen and (max-width: 768px) {
  .container {
    width: 100%;
    padding: 10px;
  }
}
@media screen and (max-width: 640px) {
  .container {
    width: 100%;
    padding: 10px;
  }
}
@media screen and (max-width: 320px) {
  .container {
    width: 100%;
    padding: 5px;
  }
}
@media only screen and (max-width: 800px) {
  .flex-grid .row {
    -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
  }
  .flex-grid .row .cell,
  .flex-grid .row .cell[class*=size] {
    -webkit-flex: 0 0 50%;
    flex: 0 0 50%;
  }
  .flex-grid .row .cell:nth-child(1):last-child,
  .flex-grid .row .cell[class*=size]:nth-child(1):last-child,
  .flex-grid .row .cell:nth-child(3):last-child,
  .flex-grid .row .cell[class*=size]:nth-child(3):last-child,
  .flex-grid .row .cell:nth-child(5):last-child,
  .flex-grid .row .cell[class*=size]:nth-child(5):last-child,
  .flex-grid .row .cell:nth-child(7):last-child,
  .flex-grid .row .cell[class*=size]:nth-child(7):last-child,
  .flex-grid .row .cell:nth-child(9):last-child,
  .flex-grid .row .cell[class*=size]:nth-child(9):last-child,
  .flex-grid .row .cell:nth-child(11):last-child,
  .flex-grid .row .cell[class*=size]:nth-child(11):last-child {
    -webkit-flex-basis: 100%;
            flex-basis: 100%;
  }
}
@media only screen and (max-width: 640px) {
  .flex-grid .row {
    -webkit-flex-direction: column;
            flex-direction: column;
  }
}
@media screen and (max-width: 800px) {
  .grid .row,
  .grid .row[class*=cells] {
    margin: 0;
  }
  .grid .row > .cell,
  .grid .row[class*=cells] > .cell,
  .grid .row > .cell[class*=colspan],
  .grid .row[class*=cells] > .cell[class*=colspan] {
    width: 48.936175% ;
    margin-bottom: 10px;
  }
  .grid .row > .cell:nth-child(odd),
  .grid .row[class*=cells] > .cell:nth-child(odd),
  .grid .row > .cell[class*=colspan]:nth-child(odd),
  .grid .row[class*=cells] > .cell[class*=colspan]:nth-child(odd) {
    margin-left: 0;
  }
  .grid .row > .cell:nth-child(1):last-child,
  .grid .row[class*=cells] > .cell:nth-child(1):last-child,
  .grid .row > .cell[class*=colspan]:nth-child(1):last-child,
  .grid .row[class*=cells] > .cell[class*=colspan]:nth-child(1):last-child,
  .grid .row > .cell:nth-child(3):last-child,
  .grid .row[class*=cells] > .cell:nth-child(3):last-child,
  .grid .row > .cell[class*=colspan]:nth-child(3):last-child,
  .grid .row[class*=cells] > .cell[class*=colspan]:nth-child(3):last-child,
  .grid .row > .cell:nth-child(5):last-child,
  .grid .row[class*=cells] > .cell:nth-child(5):last-child,
  .grid .row > .cell[class*=colspan]:nth-child(5):last-child,
  .grid .row[class*=cells] > .cell[class*=colspan]:nth-child(5):last-child,
  .grid .row > .cell:nth-child(7):last-child,
  .grid .row[class*=cells] > .cell:nth-child(7):last-child,
  .grid .row > .cell[class*=colspan]:nth-child(7):last-child,
  .grid .row[class*=cells] > .cell[class*=colspan]:nth-child(7):last-child,
  .grid .row > .cell:nth-child(9):last-child,
  .grid .row[class*=cells] > .cell:nth-child(9):last-child,
  .grid .row > .cell[class*=colspan]:nth-child(9):last-child,
  .grid .row[class*=cells] > .cell[class*=colspan]:nth-child(9):last-child,
  .grid .row > .cell:nth-child(11):last-child,
  .grid .row[class*=cells] > .cell:nth-child(11):last-child,
  .grid .row > .cell[class*=colspan]:nth-child(11):last-child,
  .grid .row[class*=cells] > .cell[class*=colspan]:nth-child(11):last-child {
    width: 100%;
  }
}
@media screen and (max-width: 640px) {
  .grid .row,
  .grid .row[class*=cells] {
    margin: 0;
  }
  .grid .row > .cell,
  .grid .row[class*=cells] > .cell,
  .grid .row > .cell[class*=colspan],
  .grid .row[class*=cells] > .cell[class*=colspan] {
    width: 100%;
    margin: .3125rem 0;
  }
}
@media screen and (max-width: 800px) {
  .grid.condensed .row,
  .grid.condensed .row[class*=cells] {
    margin: 0;
  }
  .grid.condensed .row > .cell,
  .grid.condensed .row[class*=cells] > .cell,
  .grid.condensed .row > .cell[class*=colspan],
  .grid.condensed .row[class*=cells] > .cell[class*=colspan] {
    width: 50% ;
    margin-bottom: 10px ;
  }
  .grid.condensed .row > .cell:nth-child(odd),
  .grid.condensed .row[class*=cells] > .cell:nth-child(odd),
  .grid.condensed .row > .cell[class*=colspan]:nth-child(odd),
  .grid.condensed .row[class*=cells] > .cell[class*=colspan]:nth-child(odd) {
    margin-left: 0;
  }
  .grid.condensed .row > .cell:nth-child(1):last-child,
  .grid.condensed .row[class*=cells] > .cell:nth-child(1):last-child,
  .grid.condensed .row > .cell[class*=colspan]:nth-child(1):last-child,
  .grid.condensed .row[class*=cells] > .cell[class*=colspan]:nth-child(1):last-child,
  .grid.condensed .row > .cell:nth-child(3):last-child,
  .grid.condensed .row[class*=cells] > .cell:nth-child(3):last-child,
  .grid.condensed .row > .cell[class*=colspan]:nth-child(3):last-child,
  .grid.condensed .row[class*=cells] > .cell[class*=colspan]:nth-child(3):last-child,
  .grid.condensed .row > .cell:nth-child(5):last-child,
  .grid.condensed .row[class*=cells] > .cell:nth-child(5):last-child,
  .grid.condensed .row > .cell[class*=colspan]:nth-child(5):last-child,
  .grid.condensed .row[class*=cells] > .cell[class*=colspan]:nth-child(5):last-child,
  .grid.condensed .row > .cell:nth-child(7):last-child,
  .grid.condensed .row[class*=cells] > .cell:nth-child(7):last-child,
  .grid.condensed .row > .cell[class*=colspan]:nth-child(7):last-child,
  .grid.condensed .row[class*=cells] > .cell[class*=colspan]:nth-child(7):last-child,
  .grid.condensed .row > .cell:nth-child(9):last-child,
  .grid.condensed .row[class*=cells] > .cell:nth-child(9):last-child,
  .grid.condensed .row > .cell[class*=colspan]:nth-child(9):last-child,
  .grid.condensed .row[class*=cells] > .cell[class*=colspan]:nth-child(9):last-child,
  .grid.condensed .row > .cell:nth-child(11):last-child,
  .grid.condensed .row[class*=cells] > .cell:nth-child(11):last-child,
  .grid.condensed .row > .cell[class*=colspan]:nth-child(11):last-child,
  .grid.condensed .row[class*=cells] > .cell[class*=colspan]:nth-child(11):last-child {
    width: 100%;
  }
}
@media only screen and (max-width: 640px) {
  .grid.condensed .row,
  .grid.condensed .row[class*=cells] {
    margin: 0;
  }
  .grid.condensed .row > .cell,
  .grid.condensed .row[class*=cells] > .cell,
  .grid.condensed .row > .cell[class*=colspan],
  .grid.condensed .row[class*=cells] > .cell[class*=colspan] {
    width: 100%;
    margin: .3125rem 0;
  }
}
@media only screen and (max-width: 640px) {
  .f-menu {
    -webkit-flex-direction: column;
            flex-direction: column;
  }
}
@media only screen and (max-width: 640px) {
  .f-menu > li .d-menu {
    position: relative;
    box-shadow: none;
    left: 0;
  }
}
@media screen and (max-width: 800px) {
  .sidebar {
    width: 52px;
  }
  .sidebar li > a {
    padding-right: 0;
    padding-left: 0;
    width: 52px !important;
  }
  .sidebar li > a > .title {
    display: none ;
  }
  .sidebar li > a > .counter {
    position: absolute;
    top: 0;
    right: 4px;
  }
}
@media screen and (max-width: 320px) {
  .wizard2 .step:before {
    width: 16px;
  }
}
@media screen and (max-width: 800px) {
  .tile {
    width: 120px;
    height: 120px;
  }
}
@media screen and (max-width: 800px) {
  .tile.small-tile {
    width: 56px;
    height: 56px;
  }
}
@media screen and (max-width: 800px) {
  .tile.wide-tile {
    width: 248px;
    height: 120px;
  }
}
@media screen and (max-width: 800px) {
  .tile.wide-tile-v {
    width: 120px;
    height: 248px;
  }
}
@media screen and (max-width: 800px) {
  .tile.large-tile {
    width: 248px;
    height: 248px;
  }
}
@media screen and (max-width: 800px) {
  .tile.big-tile {
    width: 376px;
    height: 376px;
  }
}
@media screen and (max-width: 800px) {
  .tile.super-tile {
    width: 504px;
    height: 504px;
  }
}
@media screen and (max-width: 800px) {
  .tile-square {
    width: 120px;
    height: 120px;
  }
}
@media screen and (max-width: 800px) {
  .tile-small {
    width: 56px;
    height: 56px;
  }
}
@media screen and (max-width: 800px) {
  .tile-wide {
    width: 248px;
    height: 120px;
  }
}
@media screen and (max-width: 800px) {
  .tile-large {
    width: 248px;
    height: 248px;
  }
}
@media screen and (max-width: 800px) {
  .tile-big {
    width: 376px;
    height: 376px;
  }
}
@media screen and (max-width: 800px) {
  .tile-super {
    width: 504px;
    height: 504px;
  }
}
@media screen and (max-width: 800px) {
  .tile-small-x {
    width: 56px;
  }
}
@media screen and (max-width: 800px) {
  .tile-square-x {
    width: 120px;
  }
}
@media screen and (max-width: 800px) {
  .tile-wide-x {
    width: 248px;
  }
}
@media screen and (max-width: 800px) {
  .tile-large-x {
    width: 248px;
  }
}
@media screen and (max-width: 800px) {
  .tile-big-x {
    width: 376px;
  }
}
@media screen and (max-width: 800px) {
  .tile-super-x {
    width: 504px;
  }
}
@media screen and (max-width: 800px) {
  .tile-small-y {
    height: 56px;
  }
}
@media screen and (max-width: 800px) {
  .tile-square-y {
    height: 120px;
  }
}
@media screen and (max-width: 800px) {
  .tile-wide-y {
    height: 248px;
  }
}
@media screen and (max-width: 800px) {
  .tile-large-y {
    height: 248px;
  }
}
@media screen and (max-width: 800px) {
  .tile-big-y {
    height: 376px;
  }
}
@media screen and (max-width: 800px) {
  .tile-super-y {
    height: 504px;
  }
}
@media screen and (max-width: 800px) {
  .tile-content.iconic .icon {
    width: 51.2px;
    height: 51.2px;
    margin-left: -25.6px;
    margin-top: -32px;
    font-size: 51.2px;
  }
}
@media screen and (max-width: 800px) {
  .tile-small .tile-content.iconic .icon {
    font-size: 25.6px;
    width: 25.6px;
    height: 25.6px;
    margin-left: -12.8px;
    margin-top: -12.8px;
  }
}
@media screen and (max-width: 640px) {
  .tile-area {
    width: 100% ;
    padding: 0;
  }
  .tile-area .tile-area-title {
    display: none;
  }
  .tile-area .tile-group {
    margin: 0 ;
    padding: 0 ;
    float: none;
  }
  .tile-area .tile-group .tile-group-title {
    display: none;
  }
}
@media screen and (max-width: 640px) {
  .tile-container {
    width: 100% ;
  }
}
@media screen and (max-width: 320px) {
  .tile-big,
  .tile.big-tile,
  .tile-super,
  .tile.super-tile {
    width: 310px ;
  }
}
@media screen and (max-width: 320px) {
  .no-small-phone {
    display: none !important;
  }
}
@media screen and (max-width: 640px) {
  .no-phone {
    display: none !important;
  }
}
@media screen and (max-width: 800px) {
  .no-tablet {
    display: none !important;
  }
}
@media screen and (min-width: 801px) {
  .no-pc {
    display: none !important;
  }
}

    </style>