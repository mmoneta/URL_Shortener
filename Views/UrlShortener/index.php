<table class="table">
  <thead class="thead-dark">
    <th scope="col"></th>
    <th scope="col">Key</th>
    <th scope="col">Link</th>
  </thead>
  <tbody>
    <?php
      if (isset($collection))
        foreach ($collection as $key => $element):
    ?>
    <tr>
      <th scope="row"><?= $key + 1 ?></th>
      <td><?= $element['key'] ?></td>
      <td>
        <button data-url="<?= $element['link'] ?>" class="copy-to-clipboard">Copy URL to clipboard</button>
       </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>