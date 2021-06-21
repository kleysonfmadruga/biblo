defmodule Biblo.Repo.Migrations.CreateBooksCategoriesTable do
  @moduledoc false
  use Ecto.Migration

  def change do
    create table :books_categories do
      add :book_id, references(:books, type: :binary_id)
      add :category_id, references(:categories, type: :binary_id)
    end

    create unique_index(:books_categories, [:book_id, :category_id])
  end
end
