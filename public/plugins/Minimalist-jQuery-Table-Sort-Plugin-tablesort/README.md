# jquery.tablesort
Simple jQuery plugin for sorting table rows
# Usage
#### Include the plugin
```html
<script src="/path/to/jquery.tablesort.js"></script>
```
#### Add class="sortable" to any sortable columns along with a data-sorttype attribute if you want it to sort by something other that string.
```html
<table>
  <thead>
    <tr>
      <th>not sortable</th>
      <th class="sortable" data-sorttype="number">number</th>
      <th class="sortable">string</th>
      <th class="sortable" data-sorttype="date">date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>this</td>
      <td>1</td>
      <td>a</td>
      <td>2/3/2015</td>
    </tr>
    <tr>
      <td>column is</td>
      <td>2</td>
      <td>c</td>
      <td>3/4/15</td>
    </tr>
    <tr>
      <td>not sortable</td>
      <td>3</td>
      <td>b</td>
      <td>2015-01-01</td>
    </tr>
  </tbody>
</table>
```
#### Call the plugin on the table.
```javascript
$("table").tablesort();
```
