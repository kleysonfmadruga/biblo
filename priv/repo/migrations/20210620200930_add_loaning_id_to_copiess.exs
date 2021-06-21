defmodule Biblo.Repo.Migrations.AddBorrowingIdToCopies do
  @moduledoc false

  use Ecto.Migration

  def change do
    alter table :copies do
      add :loaning_id, references(:loanings, type: :binary_id)
    end
  end
end
