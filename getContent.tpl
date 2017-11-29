{if $success eq 'no'}  <div class="alert alert-danger">Пожалуйста, введите числовое значение.</div>  {/if}
{if $success eq 'yes'} <div class="alert alert-success">Settings updated</div> {/if}
<fieldset>
    <h2>Акция</h2>
    <div class="panel">
        <div class="panel-heading">
            <legend><img src="../img/admin/cog.gif" alt="" width="16"
                />Настройка</legend>
        </div>
        <form action="" method="post">
            <div class="form-group clearfix">
                <label class="col-lg-3">Количество отображаемых товаров:</label>
                <div class="col-lg-9">
                    <input type="text" id="quantity"
                           name="quantity" {if isset($quantity)} value="{$quantity}" {else} value="0" {/if} />
                </div>
            </div>
            <div class="panel-footer">
                <input class="btn btn-default pull-right" type="submit"
                       name="submitButton" value="Save" />
            </div>
        </form>
    </div>
</fieldset>